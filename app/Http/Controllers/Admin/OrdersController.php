<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\OrdersFormRequest;
use App\Models\NationalityProcessStep;
use App\Models\Order;
use App\Models\OrderNote;
use App\Models\OrderProcess;
use App\Models\User;
use App\Models\Worker;
use App\Notifications\OrderStatusNotification;
use App\Services\Admin\Order\SaveOrderService;
use App\Traits\HasCrudActions;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.orders';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.orders';


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $withLists = [
        'users' => User::class,

    ];

    /**
     * The image fields
     *
     * @var array
     */
    protected $imageFields = [];

    /**
     * The image fields
     *
     * @var array
     */
    protected $manyToManyRelations = [];


    /**
     * The image fields
     *
     * @var array
     */
    protected $multiImagesFields = [];


    /**
     * The image fields
     *
     * @var array
     */
    protected $routeParams = [];


    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = OrdersFormRequest::class;


    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.orders.created',
        'updated' => 'admin/messages.orders.updated',
    ];


    public function store(OrdersFormRequest $request, SaveOrderService $saveOrderService)
    {
        $this->ajaxValidationCheck(request()); // Check Ajax Request

        $order = $saveOrderService->save($request->validated());

        if ($request['notes']) {
            $order->notes()->create([
                'note' => $request['notes'],
                'note_date' => $request['note_date'] ?? date('Y-m-d'),
                'admin_id' => $request->user()->id,
            ]);
        }


        return redirect()->route('admin.orders.index')
            ->with('successful_message', __('admin/messages.orders.created'));
    }

    public function update(OrdersFormRequest $request, SaveOrderService $saveOrderService)
    {
        $this->ajaxValidationCheck(request()); // Check Ajax Request

        $order = Order::query()->find($request->order_id);

        $order->status = $request['status'];
        $order->total_price = $request['total_price'];
        $order->amount_paid = $request['amount_paid'];

        if ($order->isDirty('status')) { // send Notification if status changed
            $user = User::query()->find($order->user_id);
            $data = [
                'badge' => '2',
                'body' => 'order_status_changed_to',
                'status' => $order->status,
                'user_id' => $order['user_id'],
                'order_id' => $order->id,
                'order_number' => $order->order_number,
            ];
            $user->notify((new OrderStatusNotification($data)));
        }

        $order->save();


        foreach ($request->order_process as $orderProcess) {
            OrderProcess::query()->where('id', $orderProcess['process_id'])->update([
                'start_date' => $orderProcess['start_date'],
                'end_date' => $orderProcess['end_date'],
                'status' => $orderProcess['status']
            ]);
        }

        OrderNote::query()->where('order_id', $request->order_id)->delete();

        foreach ($request->notes as $orderNote) {

            $order->notes()->create([
                'note' => $orderNote['notes'],
                'note_date' => $orderNote['note_date'],
                'admin_id' => $request->user()->id,
            ]);
        }

        return redirect()->route('admin.orders.index')
            ->with('successful_message', __('admin/messages.orders.updated'));
    }

}

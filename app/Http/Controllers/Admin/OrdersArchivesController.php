<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\OrderArchiveRequest;
use App\Http\Requests\Admin\Worker\WorkerArchiveRequest;
use App\Models\Order;
use App\Models\OrderArchive;
use App\Models\Worker;
use App\Models\WorkerArchives;
use App\Traits\HasCrudActions;
use Illuminate\Http\Request;

class OrdersArchivesController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = OrderArchive::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.orders-archives';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.orders_archives';

    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routeParams = [
        'order_id',
    ];



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
    protected $multiImagesFields = ['images'];

    /**
     * The image fields
     *
     * @var array
     */
    protected $manyToManyRelations = [

    ];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = OrderArchiveRequest::class;


    /**
     * The image fields
     *
     * @var array
     */
    protected $filesFields = ['file'];
    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.orders_archives.created',
        'updated' => 'admin/messages.orders_archives.updated',
    ];

    public function show(int $id)
    {
        $order = Order::query()->findOrFail($id);

        return view("{$this->viewPath}.show", compact('order'));
    }

    public function create()
    {
        return view("{$this->viewPath}.create")->with([
            'order' => Order::query()->findOrFail(request()->route('order_id')),
        ]);
    }

    public function edit()
    {
         return view("{$this->viewPath}.edit")->with([
            'order' => Order::query()->findOrFail(request()->route('order_id')),
            'order_archive' => OrderArchive::query()->findOrFail(request()->route('orders_archive_id')),
        ]);
    }

}

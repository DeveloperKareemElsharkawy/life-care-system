<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Http\Requests\Admin\Client\CreateClientRequest;
use App\Http\Requests\Admin\Page\PageRequest;
use App\Http\Requests\Admin\Pile\PileRequest;
use App\Models\Category;
use App\Models\Client;
use App\Models\Folder;
use App\Models\OrderItem;
use App\Models\Page;
use App\Models\Pile;
use App\Models\PileType;
use App\Models\User;
use App\Services\Admin\Images\UploadImageService;
use App\Traits\HasCrudActions;

class PilesController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Pile::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.piles';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.piles';


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
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $manyToManyRelations = [
    ];
    /**
     * The image fields
     *
     * @var array
     */
    protected $imageFields = [];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = PileRequest::class;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $multiImagesFields = [];


    protected $routeParams = [];


    protected function hasManyRelations($entity, $data)
    {

    }

    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.piles.created',
        'updated' => 'admin/messages.piles.updated',
    ];

    /**
     * Show create Form
     *
     *
     */
    public function create()
    {
        $clients = User::query()->get();
        $pileTypes = PileType::query()->get();
        return view('admin-panel.piles.create', compact('clients', 'pileTypes'));
    }

    public function edit($pileId)
    {
        $pile = Pile::query()->with('clients', 'pile_clients.client.folders', 'folders')->find($pileId);
        $clients = User::query()->get();
        $pileTypes = PileType::query()->get();
        return view('admin-panel.piles.edit', compact('clients', 'pile', 'pileTypes'));
    }

    public function store(PileRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $validated = $request->validated(); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('video', $validated['image']);
            $validated['image'] = $image;

        }

        if ($request['video']) {
            $video = $uploadImageService->execute('clients', $validated['video']);
            $validated['video'] = $video;
        }

        $pile = Pile::create($validated);

        $syncClientData = [];
        $syncFolderData = [];

        foreach ($request->clients as $client) {
            $syncClientData[$client['id']] = ['is_manager' => $client['is_manager'], 'folder_id' => $client['folder_id']];
            $syncFolderData[] = $client['folder_id'];
        }

        $pile->clients()->sync($syncClientData);
        $pile->folders()->sync($syncFolderData);

        return to_route('admin.piles.index')->with('successful_message', trans('admin/messages.clients.created'));
    }

    public function update(PileRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $validated = $request->validated(); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('video', $validated['image']);
            $validated['image'] = $image;

        }

        if ($request['video']) {
            $video = $uploadImageService->execute('clients', $validated['video']);
            $validated['video'] = $video;
        }
        unset($validated['clients']); // Replace 'item_to_remove' with the actual key you want to remove

        $pile = Pile::where('id', $request->pile_id)->first();
        $pile->update($validated);

        $syncClientData = [];
        $syncFolderData = [];


        foreach ($request->clients as $client) {
            $syncClientData[$client['id']] = ['is_manager' => $client['is_manager'], 'folder_id' => $client['folder_id']];
            $syncFolderData[] = $client['folder_id'];
        }

        $pile->clients()->sync($syncClientData);
        $pile->folders()->sync($syncFolderData);

        return to_route('admin.piles.index')->with('successful_message', trans('admin/messages.clients.created'));
    }


    public function getUserFolders()
    {
        $folders = Folder::query()->where('user_id', request()->user_id)->get();

        return response()->json($folders);
    }

    public function show($pileId)
    {
        $pile = Pile::query()->with('pileType')->find($pileId);


        $paymentStatuses = ['pending', 'paid', 'refunded'];

        $totalPrices = [];

        foreach ($paymentStatuses as $status) {
            $orderItems = OrderItem::where('payment_status', $status) ->whereHas('item', function ($query) use ($pileId) {
                $query->where('pile_id', $pileId);
            })->get();
            $totalPrices[$status] = $orderItems->sum(function ($orderItem) {
                return $orderItem->quantity * $orderItem->price;
            });
        }


        return view('admin-panel.piles.show', compact('pile','totalPrices'));
    }

}

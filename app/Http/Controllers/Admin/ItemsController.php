<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Http\Requests\Admin\Page\PageRequest;
use App\Http\Requests\Admin\College\CollegeRequest;
use App\Http\Requests\Admin\Pile\PileItemRequest;
use App\Http\Requests\Admin\Pile\PileRequest;
use App\Models\Category;
use App\Models\College;
use App\Models\Item;
use App\Models\Page;
use App\Models\Pile;
use App\Traits\HasCrudActions;

class ItemsController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.items';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.items';


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
        'categories' => Category::class
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
    protected $validation = PileItemRequest::class;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $multiImagesFields = [];


    protected $routeParams = ['pile_id'];


    protected function hasManyRelations($entity, $data)
    {

    }

    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.colleges.created',
        'updated' => 'admin/messages.colleges.updated',
    ];

    public function index($pileId)
    {
        return view('admin-panel.items.index',compact('pileId'));
    }

    public function create($pileId)
    {
        $categories = Category::all();
        return view('admin-panel.items.create',compact('pileId','categories'));
    }

    public function edit($pileId,$itemId)
    {
        $categories = Category::all();
        $item = Item::find($itemId);
        return view('admin-panel.items.edit',compact('pileId','categories','item'));
    }

}

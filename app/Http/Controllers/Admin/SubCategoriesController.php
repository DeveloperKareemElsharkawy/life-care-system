<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Http\Requests\Admin\Category\SubCategoryFormRequest;
use App\Models\Category;
use App\Traits\HasCrudActions;

class SubCategoriesController extends Controller
{
    use HasCrudActions;


    protected $model = Category::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.sub-categories';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $multiImagesFields = [];
    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $routeParams = [];

    /**
     * View path of the resource.
     *
     *
     * @param $entity
     * @param $data
     */
    protected function hasManyRelations($entity, $data)
    {

    }

    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.sub-categories';


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
    ];

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
    protected $imageFields = ['image'];

    /**
     * The image fields
     *
     * @var array
     */
    protected $translatableFields = [
    ];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = SubCategoryFormRequest::class;


    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.categories.created',
        'updated' => 'admin/messages.categories.updated',
    ];


    public function index(int $categoryId)
    {
        $mainCategories = Category::query()->where('parent_id', $categoryId)->get();

        return view("{$this->viewPath}.index")->with(['mainCategories' => $mainCategories, 'categoryId' => $categoryId]);
    }

    public function edit(int $categoryId,$subCategoryId)
    {
        $entity = $this->getEntity($subCategoryId);

        $mainCategories = Category::query()->whereNull('parent_id')->get();

        return view("{$this->viewPath}.edit")->with(['mainCategories' => $mainCategories, 'subCategory' => $entity]);
    }

    public function create(int $categoryId)
    {
        $mainCategories = Category::query()->whereNull('parent_id')->get();

        return view("{$this->viewPath}.create")->with(['mainCategories' => $mainCategories, 'categoryId' => $categoryId]);
    }


    public function store(int $categoryId, SubCategoryFormRequest $request)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $mainCategories = Category::query()->create($request->validated());

        return to_route('admin.sub-categories.index', ['category_id' => $request->parent_id])
            ->with('successful_message', trans('تم إضافه نخصص فرعى جديد'));

    }

    public function update(int $categoryId,$subCategoryId, SubCategoryFormRequest $request)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $mainCategories = Category::query()->where('id',$subCategoryId)->update($request->validated());

        return to_route('admin.sub-categories.index', ['category_id' => $request->parent_id])
            ->with('successful_message', trans('تم تعديل بيانات التخصص'));

    }

}

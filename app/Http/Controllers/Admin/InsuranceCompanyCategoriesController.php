<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InsuranceCompany\InsuranceCompanyCategoriesRequest;
use App\Models\Category;
use App\Models\InsuranceCompanyCategory;
use App\Traits\HasCrudActions;
use Illuminate\Http\Request;

class InsuranceCompanyCategoriesController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = InsuranceCompanyCategory::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.insurance-company-categories';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.insurance-company-categories';


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
    protected $validation = InsuranceCompanyCategoriesRequest::class;

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
        'created' => 'تم إضافة سعر جديد للجلسة',
        'updated' => 'تم تعديل سعر الجلسة',
    ];


    public function index($insuranceCompanyId)
    {
        return view('admin-panel.insurance-company-categories.index', compact('insuranceCompanyId'));
    }


    public function create($insuranceCompanyId)
    {
        $categories = Category::query()->whereNull('parent_id')->get();
        return view('admin-panel.insurance-company-categories.create', compact('insuranceCompanyId', 'categories'));
    }

    public function edit($insuranceCompanyId, $insuranceCompanyCategoryId)
    {
        $categories = Category::query()->whereNull('parent_id')->get();

        $insuranceCompanyCategory = InsuranceCompanyCategory::query()->find($insuranceCompanyCategoryId);

        $subCategories = Category::query()->where('parent_id', $insuranceCompanyCategory->main_category_id)->get();

        return view('admin-panel.insurance-company-categories.edit', compact('insuranceCompanyId', 'insuranceCompanyCategory', 'categories', 'subCategories'));
    }


    public function store($insuranceCompanyId, InsuranceCompanyCategoriesRequest $request)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        InsuranceCompanyCategory::create($request->validated());

        return redirect()->route('admin.insurance-company-categories.index', ['insurance_company_id' => $insuranceCompanyId])
            ->with('successful_message', 'تم إضافة نسبة تحمل جديدة');
    }


    public function update($insuranceCompanyCategoryId, InsuranceCompanyCategoriesRequest $request)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $insuranceCompanyCategory = InsuranceCompanyCategory::query()->where('id', $insuranceCompanyCategoryId)->first();

        $insuranceCompanyCategory->update($request->validated());

        return redirect()->route('admin.insurance-company-categories.index', ['insurance_company_id' => $insuranceCompanyCategory->insurance_company_id])
            ->with('successful_message', 'تم تعديل  نسبة التحمل ');
    }


    public function getSubCategory( Request $request)
    {
        $subCategories = Category::query()->where('parent_id', $request->main_category_id)->get();
        return response()->json(['data' => $subCategories]);
    }
}

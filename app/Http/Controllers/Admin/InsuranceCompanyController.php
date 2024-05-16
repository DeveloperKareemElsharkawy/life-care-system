<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Http\Requests\Admin\InsuranceCompany\InsuranceCompanyRequest;
use App\Http\Requests\Admin\Page\PageRequest;
use App\Http\Requests\Admin\College\CollegeRequest;
use App\Http\Requests\Admin\Pile\PileRequest;
use App\Http\Requests\Admin\Specialization\SpecializationRequest;
use App\Models\Category;
use App\Models\College;
use App\Models\InsuranceCompany;
use App\Models\Page;
use App\Models\Pile;
use App\Models\Specialization;
use App\Traits\HasCrudActions;
use Illuminate\Http\Request;

class InsuranceCompanyController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = InsuranceCompany::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.insurance-companies';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.insurance-companies';


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
    protected $imageFields = ['image'];

    /**
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = InsuranceCompanyRequest::class;

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
        'created' => 'تم إضافة شركه جديده',
        'updated' => 'تم تعديل بيانات الشركة',
    ];

    public function getPrice(Request $request){
        $insuranceCompany = InsuranceCompany::query()->find($request->insurance_company_id);
        return response()->json($insuranceCompany->examination_price);
    }

}

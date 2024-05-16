<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Http\Requests\Admin\Category\SubCategoryFormRequest;
use App\Http\Requests\Admin\PaymentMethods\PaymentMethodsFormRequest;
use App\Http\Requests\Admin\Pile\PileTypeRequest;
use App\Models\Category;
use App\Models\PaymentMethod;
use App\Models\PileType;
use App\Traits\HasCrudActions;

class PileTypesController extends Controller
{
    use HasCrudActions;


    protected $model = PileType::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.pile-types';

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
    protected $routePrefix = 'admin.pile-types';


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
    protected $validation = PileTypeRequest::class;


    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.categories.created',
        'updated' => 'admin/messages.categories.updated',
    ];

}

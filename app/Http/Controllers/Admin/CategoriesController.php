<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryFormRequest;
use App\Models\Category;
use App\Traits\HasCrudActions;

class CategoriesController extends Controller
{
    use HasCrudActions;


    protected $model = Category::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.categories';

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
    protected $routePrefix = 'admin.categories';


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
    protected $validation = CategoryFormRequest::class;


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

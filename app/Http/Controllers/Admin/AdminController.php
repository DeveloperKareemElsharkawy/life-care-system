<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\System\Admin\CreateSystemUserRequest;
use App\Http\Requests\Admin\System\Admin\UpdateSystemUserRequest;
use App\Http\Requests\Admin\System\Admin\SystemUserFormRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Traits\HasCrudActions;


class  AdminController extends Controller
{

    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'admin-panel.system.users';


    /**
     * Route prefix of the resource.
     *
     * @var string
     */
    protected $routePrefix = 'admin.system.users';


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
    protected $routeParams = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $withLists = [
        'roles' => Role::class,

    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $manyToManyRelations = [
        'roles'
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
    protected $multiImagesFields = [];


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
     * Form Validation Store / Update .
     *
     * @var array|string
     */
    protected $validation = SystemUserFormRequest::class;


    /**
     * keys for Actions Messages translations
     *
     * @var array|string
     */
    protected $getSuccessfulMessage = [
        'created' => 'admin/messages.admins.created',
        'updated' => 'admin/messages.admins.updated',
    ];


}

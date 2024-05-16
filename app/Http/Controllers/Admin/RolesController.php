<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\CreateRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function view;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;
use Auth;

class RolesController extends Controller
{

    protected $assignPermissions;

    public function __construct()
    {
        $this->assignPermissions = Config::get('laratrust.panel.assign_permissions_to_user'); // for later upgrade
    }

    /**
     * Show Roles List
     *
     * @return Application|Factory|View
     *
     */
    public function index()
    {
         return view('admin-panel.roles.index');
    }


    /**
     * Show create Role Form
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {

        $permissions = Permission::query()->get()->groupBy('model');

        return view('admin-panel.roles.create', compact('permissions'));
    }


    /**
     * Save Role
     *
     * @return RedirectResponse
     *
     */
    public function store(CreateRoleRequest $request)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        $role = Role::query()->withoutGlobalScope('active')->create($request->validated());

        $role->syncPermissions($request->validated()['permissions']);

        return to_route('admin.roles.index')->with('successful_message', trans('admin/messages.roles.created'));
    }

    /**
     * Edit Role
     *
     * @return Application|Factory|View
     *
     */
    public function edit($roleId)
    {
        $role = Role::query()->withoutGlobalScope('active')->findOrFail($roleId);

        $permissions = Permission::query()->get()->groupBy('model');

        return view('admin-panel.roles.edit', compact('permissions', 'role'));
    }


    /**
     * Update Role
     *
     * @return RedirectResponse
     *
     */
    public function update($roleId, UpdateRoleRequest $request)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        $role = Role::query()->withoutGlobalScope('active')->findOrFail($roleId);

        $role->update($request->validated());

        $role->syncPermissions($request->validated()['permissions']);

        return to_route('admin.roles.index')->with('successful_message', trans('admin/messages.roles.updated'));
    }
}

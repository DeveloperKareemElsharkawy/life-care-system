<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Driver\CreateDriverRequest;
use App\Http\Requests\Admin\Driver\UpdateDriverRequest;
use App\Http\Requests\Admin\VehiclesOwners\CreateVehiclesOwnerRequest;
use App\Http\Requests\Admin\VehiclesOwners\UpdateVehiclesOwnerRequest;
use App\Http\Requests\Admin\VehiclesTypes\CreateVehiclesTypeRequest;
use App\Http\Requests\Admin\VehiclesTypes\UpdateVehiclesTypeRequest;
use App\Models\Driver;
use App\Models\VehicleType;
use App\Services\Admin\Images\UploadImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VehiclesTypesController extends Controller
{
    /**
     * List All Admins
     *
     * LiveWire Component in Blade File
     *
     * @return Application|Factory|View
     *
     */
    public function index()
    {
        return view('admin-panel.vehicles-types.index');
    }

    /**
     * Show create Form
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {
        return view('admin-panel.vehicles-types.create');
    }

    /**
     * Save New Admin in System
     *
     * @return RedirectResponse
     *
     */
    public function store(CreateVehiclesTypeRequest $request)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        VehicleType::query()->create($request->validated());

        return to_route('admin.vehicles.types.index');
    }

    /**
     * Show Edit Form
     *
     * @return Application|Factory|View
     *
     */
    public function edit($systemUserId)
    {
        $admin = VehicleType::query()->findOrFail($systemUserId);
        return view('admin-panel.vehicles-types.edit', compact('admin'))->with('successful_message', trans('admin/messages.vehicles_types.created'));
    }

    /**
     * Update System User
     *
     * @return RedirectResponse
     *
     */
    public function update(UpdateVehiclesTypeRequest $request)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        VehicleType::query()->where('id', $request['VehicleType_id'])->update($request->safe()->except('VehicleType_id'));

        return to_route('admin.vehicles.types.index')->with('successful_message', trans('admin/messages.vehicles_types.updated'));
    }

}

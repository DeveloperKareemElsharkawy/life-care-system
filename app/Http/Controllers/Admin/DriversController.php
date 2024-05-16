<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Driver\CreateDriverRequest;
use App\Http\Requests\Admin\Driver\UpdateDriverRequest;
use App\Http\Requests\Admin\VehiclesOwners\CreateVehiclesOwnerRequest;
use App\Http\Requests\Admin\VehiclesOwners\UpdateVehiclesOwnerRequest;
use App\Models\Driver;
use App\Services\Admin\Images\UploadImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DriversController extends Controller
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
        return view('admin-panel.drivers.index');
    }


    /**
     * Show create Form
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {
        return view('admin-panel.drivers.create');
    }


    /**
     * Save New Admin in System
     *
     * @return RedirectResponse
     *
     */
    public function store(CreateDriverRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $validated = $request->safe(); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('system/users', $validated['image']);
            $validated = $request->safe()->merge(['image' => $image]);
        }

        Driver::query()->create($validated->all());

        return to_route('admin.drivers.index')->with('successful_message', trans('admin/messages.vehicles_drivers.created'));
    }


    /**
     * Show Edit Form
     *
     * @return Application|Factory|View
     *
     */
    public function edit($systemUserId)
    {
        $admin = Driver::query()->findOrFail($systemUserId);
        return view('admin-panel.drivers.edit', compact('admin'));
    }


    /**
     * Update System User
     *
     * @return RedirectResponse
     *
     */
    public function update(UpdateDriverRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        $validated = $request->safe(); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('system/users', $validated['image']);
            $validated = $request->safe()->merge(['image' => $image]);
        }

        Driver::query()->where('id', $validated['driver_id'])->update($validated->except(['driver_id']));

        return to_route('admin.drivers.index')->with('successful_message', trans('admin/messages.vehicles_drivers.updated'));
    }

}

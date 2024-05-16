<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Vehicles\CreateVehicleRequest;
use App\Http\Requests\Admin\Vehicles\UpdateVehicleRequest;
use App\Http\Requests\Admin\VehiclesTypes\CreateVehiclesTypeRequest;
use App\Http\Requests\Admin\VehiclesTypes\UpdateVehiclesTypeRequest;
use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\VehiclesOwner;
use App\Models\VehicleType;
use App\Services\Admin\Images\MultiImageUploadService;
use App\Services\Admin\Images\UploadImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VehiclesController extends Controller
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
        return view('admin-panel.vehicles.index');
    }


    /**
     * Show create Form
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {
        $vehiclesTypes = VehicleType::all();
        $owners = Owner::all();
        return view('admin-panel.vehicles.create', compact('vehiclesTypes', 'owners'));
    }


    /**
     * Save New Admin in System
     *
     * @return RedirectResponse
     *
     */
    public function store(CreateVehicleRequest $request, MultiImageUploadService $multiImageUploadService, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        $images = $multiImageUploadService->execute('vehicles', $request['gallery']);

        $image = $uploadImageService->execute('system/users', $request['image']); // Save Single Image

        $validated = $request->safe()->merge(['image' => $image, 'gallery' => $images]);

        $vehicle = Vehicle::query()->create($validated->all());

        $vehicle->owners()->sync($request['owners']);

        return to_route('admin.vehicles.index');
    }


    /**
     * Show Edit Form
     *
     * @return Application|Factory|View
     *
     */
    public function edit($systemUserId)
    {
        $vehicle = Vehicle::query()->with('owners_percentage')->findOrFail($systemUserId);
        $vehiclesTypes = VehicleType::all();
        $owners = Owner::all();
        return view('admin-panel.vehicles.edit', compact('vehicle', 'vehiclesTypes', 'owners'))->with('successful_message', trans('admin/messages.vehicles_types.created'));
    }

    /**
     * Update System User
     *
     * @return RedirectResponse
     *
     */
    public function update(UpdateVehicleRequest $request, MultiImageUploadService $multiImageUploadService, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        $images = $multiImageUploadService->execute('vehicles', $request['gallery']);

        $validated = $request->safe()->merge(['gallery' => $images]);

        if ($request['image']) {
            $image = $uploadImageService->execute('system/users', $validated['image']); // Save Single Image
            $validated = $request->safe()->merge(['image' => $image, 'gallery' => $images]);
        }

        $vehicle = Vehicle::query()->where('id', $request['Vehicle_id'])->first();

        $vehicle->update($validated->except(['Vehicle_id']));

        $vehicle->owners()->sync($request['owners']);

        return to_route('admin.vehicles.index')->with('successful_message', trans('admin/messages.vehicles_types.updated'));
    }

}

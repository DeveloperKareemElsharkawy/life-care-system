<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VehiclesOwners\CreateVehiclesOwnerRequest;
use App\Http\Requests\Admin\VehiclesOwners\UpdateVehiclesOwnerRequest;
use App\Models\Owner;
use App\Services\Admin\Images\UploadImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VehiclesOwnersController extends Controller
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
        return view('admin-panel.vehicles-owners.index');
    }


    /**
     * Show create Form
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {
        return view('admin-panel.vehicles-owners.create');
    }


    /**
     * Save New Admin in System
     *
     * @return RedirectResponse
     *
     */
    public function store(CreateVehiclesOwnerRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        $validated = $request->safe(); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('system/users', $validated['image']);
            $validated = $request->safe()->merge(['image' => $image]);
        }

        Owner::query()->create($validated->all());

        return to_route('admin.vehicles.owners.index')->with('successful_message', trans('admin/messages.vehicles_types.created'));
    }


    /**
     * Show Edit Form
     *
     * @return Application|Factory|View
     *
     */
    public function edit($systemUserId)
    {

        $admin = Owner::query()->findOrFail($systemUserId);
        return view('admin-panel.vehicles-owners.edit', compact('admin'));
    }


    /**
     * Update System User
     *
     * @return RedirectResponse
     *
     */
    public function update(UpdateVehiclesOwnerRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        $validated = $request->safe(); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('system/users', $validated['image']);
            $validated = $request->safe()->merge(['image' => $image]);
        }

        Owner::query()->where('id', $validated['VehicleOwner_id'])->update($validated->except(['VehicleOwner_id']));

        return to_route('admin.vehicles.owners.index')->with('successful_message', trans('admin/messages.vehicles_owners.updated'));
    }

}

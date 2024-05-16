<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Trailer\CreateTrailerRequest;
use App\Http\Requests\Admin\Trailer\UpdateTrailerRequest;
use App\Http\Requests\Admin\Vehicles\CreateVehicleRequest;
use App\Http\Requests\Admin\Vehicles\UpdateVehicleRequest;
use App\Models\Owner;
use App\Models\Trailer;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Services\Admin\Images\MultiImageUploadService;
use App\Services\Admin\Images\UploadImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TrailerController extends Controller
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
        return view('admin-panel.trailers.index');
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
        return view('admin-panel.trailers.create', compact('vehiclesTypes', 'owners'));
    }


    /**
     * Save New Admin in System
     *
     * @return RedirectResponse
     *
     */
    public function store(CreateTrailerRequest $request, MultiImageUploadService $multiImageUploadService, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        $images = $multiImageUploadService->execute('trailers', $request['gallery']);

        $image = $uploadImageService->execute('trailers', $request['image']); // Save Single Image

        $validated = $request->safe()->merge(['image' => $image, 'gallery' => $images]);

        $trailer = Trailer::query()->create($validated->all());

        $trailer->owners()->sync($request['owners']);

        return to_route('admin.trailers.index');
    }


    /**
     * Show Edit Form
     *
     * @return Application|Factory|View
     *
     */
    public function edit($systemUserId)
    {
        $trailer = Trailer::query()->with('owners_percentage')->findOrFail($systemUserId);
        $vehiclesTypes = VehicleType::all();
        $owners = Owner::all();
        return view('admin-panel.trailers.edit', compact('trailer', 'vehiclesTypes', 'owners'))->with('successful_message', trans('admin/messages.vehicles_types.created'));
    }

    /**
     * Update System User
     *
     * @return RedirectResponse
     *
     */
    public function update(UpdateTrailerRequest $request, MultiImageUploadService $multiImageUploadService, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        $images = $multiImageUploadService->execute('trailers', $request['gallery']);

        $validated = $request->safe()->merge(['gallery' => $images]);

        if ($request['image']) {
            $image = $uploadImageService->execute('trailers', $validated['image']); // Save Single Image
            $validated = $request->safe()->merge(['image' => $image, 'gallery' => $images]);
        }

        $trailer = Trailer::query()->where('id', $request['trailer_id'])->first();

        $trailer->update($validated->except(['trailer_id']));

        $trailer->owners()->sync($request['owners']);

        return to_route('admin.trailers.index')->with('successful_message', trans('admin/messages.vehicles_types.updated'));
    }
}

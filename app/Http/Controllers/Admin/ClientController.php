<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\CreateClientRequest;
use App\Http\Requests\Admin\Client\UpdateClientRequest;
use App\Models\Client;
use App\Services\Admin\Images\UploadImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        return view('admin-panel.clients.index');
    }


    /**
     * Show create Form
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {
        return view('admin-panel.clients.create');
    }


    /**
     * Save New Admin in System
     *
     * @return RedirectResponse
     *
     */
    public function store(CreateClientRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        $validated = $request->validated(); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('clients', $validated['image']);
            $validated = $request->safe()->merge(['image' => $image]);
        }
        $client = Client::create($validated->all());

        foreach ($request['destinations'] as $destination) {
            $client->destinations()->create($destination);
        }

        return to_route('admin.clients.index')->with('successful_message', trans('admin/messages.clients.created'));
    }


    /**
     * Show Edit Form
     *
     * @return Application|Factory|View
     *
     */
    public function edit($systemUserId)
    {
        $client = Client::query()->with('destinations')->findOrFail($systemUserId);
        return view('admin-panel.clients.edit', compact('client'));
    }


    /**
     * Update System User
     *
     * @return RedirectResponse
     *
     */
    public function update(UpdateClientRequest $request, UploadImageService $uploadImageService)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        $validated = $request->safe(); // return only validate Data From Form Request

        if ($request['image']) {
            $image = $uploadImageService->execute('clients', $validated['image']);
            $validated = $request->safe()->merge(['image' => $image]);
        }

        $client = Client::where('id', $validated['client_id'])->first();
        $client->update($validated->except(['client_id','destinations']));

        foreach ($request['destinations'] as $destination) {
            $client->destinations()->create($destination);
        }

        return to_route('admin.clients.index')->with('successful_message', trans('admin/messages.clients.updated'));
    }

}

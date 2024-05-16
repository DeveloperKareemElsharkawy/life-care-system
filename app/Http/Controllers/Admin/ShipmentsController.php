<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shipment\CreateShipmentsRequest;
use App\Http\Requests\Admin\Shipment\UpdateShipmentsRequest;
use App\Models\Client;
use App\Models\Destination;
use App\Models\Driver;
use App\Models\Shipment;
use App\Models\Trailer;
use App\Models\Vehicle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShipmentsController extends Controller
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
        return view('admin-panel.shipments.index');
    }

    /**
     * Show create Form
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {
        $generatedTrackingNumber = 'EA' . (hexdec(substr(uniqid(), 0, 9)) + (int)rand(1, 9)) . 'US';
        $vehicles = Vehicle::all();
        $trailers = Trailer::all();
        $clients = Client::all();
        $drivers = Driver::all();

        return view('admin-panel.shipments.create', compact('generatedTrackingNumber', 'vehicles', 'trailers', 'clients', 'drivers'));
    }

    /**
     * Save New Admin in System
     *
     * @return RedirectResponse
     *
     */
    public function store(CreateShipmentsRequest $request)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        Shipment::query()->create($request->validated());

        return to_route('admin.shipments.index')->with('successful_message', trans('admin/messages.shipments.created'));
    }

    /**
     * Show Edit Form
     *
     * @return Application|Factory|View
     *
     */
    public function edit($shipmentId)
    {
        $shipment = Shipment::query()->findOrFail($shipmentId);
        $vehicles = Vehicle::all();
        $trailers = Trailer::all();
        $clients = Client::all();
        $drivers = Driver::all();
        $destinations = Destination::query()->where('client_id', $shipment->client_id)->get();

        return view('admin-panel.shipments.edit', compact('shipment', 'vehicles', 'trailers', 'clients', 'drivers', 'destinations'));
    }

    /**
     * Update System User
     *
     * @return RedirectResponse
     *
     */
    public function update(UpdateShipmentsRequest $request)
    {
        $this->ajaxValidationCheck($request); // Check Ajax Request

        Shipment::query()->where('id', $request['shipment_id'])->update($request->safe()->except('shipment_id'));

        return to_route('admin.shipments.index')->with('successful_message', trans('admin/messages.shipments.updated'));
    }

    /**
     * ajaxClientDestinations
     *
     * @return RedirectResponse
     *
     */
    public function ajaxClientDestinations(Request $request)
    {
        return response()->json(Destination::query()->where('client_id', $request['client_id'])->get());
    }
}

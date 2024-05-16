<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Transport\CreateTransportFeeRequest;
use App\Http\Requests\Admin\Transport\UpdateTransportFeeRequest;
use App\Models\TransportFee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TransportFeeController extends Controller
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
        return view('admin-panel.transport-fees.index');
    }

    /**
     * Show create Form
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {
        return view('admin-panel.transport-fees.create');
    }

    /**
     * Save New Admin in System
     *
     * @return RedirectResponse
     *
     */
    public function store(CreateTransportFeeRequest $request)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        TransportFee::query()->create($request->validated());

        return to_route('admin.transport.fees.index')->with('successful_message', trans('admin/messages.transport_fees.created'));
    }

    /**
     * Show Edit Form
     *
     * @return Application|Factory|View
     *
     */
    public function edit($transportFeeId)
    {
        $transportFee = TransportFee::query()->findOrFail($transportFeeId);
        return view('admin-panel.transport-fees.edit', compact('transportFee'));
    }

    /**
     * Update System User
     *
     * @return RedirectResponse
     *
     */
    public function update(UpdateTransportFeeRequest $request)
    {
        $this->ajaxValidationCheck($request) ; // Check Ajax Request

        TransportFee::query()->where('id', $request['transport_fee_id'])->update($request->safe()->except('transport_fee_id'));

        return to_route('admin.transport.fees.index')->with('successful_message', trans('admin/messages.transport_fees.updated'));
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Nationality;
use App\Models\State;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders(Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        return view('admin-panel.reports.orders', compact('startDate', 'endDate'));
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    public function clients(Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $state = $request->get('state');
        $states = State::get();
        return view('admin-panel.reports.clients', compact('startDate', 'endDate', 'states', 'state'));
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    public function topWorkers(Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $state = $request->get('state');
        $states = State::get();
        return view('admin-panel.reports.top_workers', compact('startDate', 'endDate', 'states', 'state'));
    }
}

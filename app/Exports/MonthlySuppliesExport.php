<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\Doctor;
use App\Models\Transaction;
use App\Models\SessionRecord;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class MonthlySuppliesExport implements FromView, WithEvents
{
    protected $month;
    /**
     * @var mixed
     */
    private $contractType;

    public function __construct($month, $contractType)
    {
        $this->month = $month;
        $this->contractType = $contractType;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }

    /**
     * @return View
     */
    public function view(): View
    {

        $forMonth = $this->month;
        $monthYear = explode('-', $this->month);
        $year = $monthYear[0];
        $month = $monthYear[1];
        $contractType = $this->contractType;

        $transactions = Transaction::query()->whereHas('session.user', function ($query) use($contractType) {
            $query->where('contract_type', $contractType);
        })
            ->with('session.user.insurance_company', 'admin')
            ->whereMonth('date', $month)->whereYear('date', $year)->get();


        foreach ($transactions as $transaction) {
            // Instantiate the SessionService
            $sessionService = new \App\Services\Admin\Session\SessionService();

            // Call the getSessionData method from the SessionService
            $transaction->user_wallet = $sessionService->getSessionData($transaction->session_id);
        }

        $users = User::query()->whereMonth('examination_date', $month)
            ->whereYear('examination_date', $year)->where('contract_type',$contractType)->get();

        $payments = Transaction::query()->whereHas('session.user')
            ->where('type', 'Deposit')->whereMonth('date', $month)->whereYear('date', $year)->get();

        return view('exports.suppliesExportV2', get_defined_vars());
    }
}

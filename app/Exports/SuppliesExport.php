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

class SuppliesExport implements FromView, WithEvents
{
    protected $day;
    protected $contractType;

    public function __construct($day, $contractType)
    {
        $this->day = $day;
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

        $day = $this->day;
        $contractType = $this->contractType;

        $transactions = Transaction::query()->whereHas('session.user', function ($query) use($contractType) {
            $query->where('contract_type', $contractType);
        })->with('session.user.insurance_company', 'admin')->where('date', $this->day)->get();


        foreach ($transactions as $transaction) {
            // Instantiate the SessionService
            $sessionService = new \App\Services\Admin\Session\SessionService();

            // Call the getSessionData method from the SessionService
            $transaction->user_wallet = $sessionService->getSessionData($transaction->session_id);
        }

        $users = User::query()->whereDate('examination_date',$day)->where('contract_type',$contractType)->get();
        $attendances = Attendance::query()->whereDate('date',$this->day)->get();


        $payments = Transaction::query()->whereHas('session.user')->where('type' ,'Deposit')->whereDate('date',$this->day)->get();

        return view('exports.suppliesExportV2', get_defined_vars());
    }
}

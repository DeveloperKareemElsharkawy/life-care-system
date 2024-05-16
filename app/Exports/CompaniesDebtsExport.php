<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\Doctor;
use App\Models\InsuranceCompany;
use App\Models\Transaction;
use App\Models\SessionRecord;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CompaniesDebtsExport implements FromView,WithEvents,WithColumnFormatting
{
    protected $month;


    public function columnFormats(): array
    {
        return [
             'C' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function __construct($month)
    {
        $this->month = $month;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }


    /**
     * @return View
     */
    public function view(): View
    {

        $monthYear = explode('-', $this->month);
        $year = $monthYear[0];
        $month = $monthYear[1];

        $companies = InsuranceCompany::query()->whereHas('sessions.attendances', function ($query) use ($month, $year) {
            $query->whereMonth('date', $month)
                ->whereYear('date', $year);
        })->with('sessions.attendances', function ($query) use ($month, $year) {
            $query->whereMonth('date', $month)
                ->whereYear('date', $year);
        })
            ->get();


        foreach ($companies as $company) {
            $company->attendence = Attendance::query()->whereHas('session', function ($query) use ($company,$month,$year) {
                $query->where('insurance_company_id', $company->id)->whereMonth('date', $month)
                    ->whereYear('date', $year);
            })->whereHas('sessionRecord')->with('sessionRecord', 'session.user')->get();


            $totalAttendence = 0;
            $totalDebt = 0;

            foreach ($company->attendence as $attendence) {
                $totalAttendence++;
                $totalDebt += $attendence->sessionRecord->sessions_debt_for_company;
            }

            $company->attendence_count = $totalAttendence;
            $company->debt = $totalDebt;
        }


        return view('exports.company_debts_export', get_defined_vars());
    }
}

<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\InsuranceCompany;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CompaniesDailyDebtsExport implements FromView, WithEvents, WithColumnFormatting
{
    protected $day;


    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function __construct($day)
    {
        $this->day = $day;
    }

    /**
     * @return array
     */
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


        $companies = InsuranceCompany::query()->whereHas('sessions.attendances', function ($query) use ($day) {
            $query->whereDate('date', $day);
        })->with('sessions.attendances', function ($query) use ($day) {
            $query->whereDate('date', $day);

        })->get();




        foreach ($companies as $company) {
            $company->attendence = Attendance::query()->whereHas('session', function ($query) use ($company, $day) {
                $query->where('insurance_company_id', $company->id)->whereDate('date', $day);
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

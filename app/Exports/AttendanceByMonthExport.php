<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\Doctor;
use App\Models\InsuranceCompany;
use App\Models\Transaction;
use App\Models\SessionRecord;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class AttendanceByMonthExport implements FromView, WithEvents, WithColumnFormatting
{
    protected $monh;


    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function __construct($monh)
    {
        $this->monh = $monh;
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

        $attendances = Attendance::query()->whereMonth('date', 3)->whereYear('date', 2024)->get();


        return view('exports.attendance_by_day_export', get_defined_vars());
    }
}

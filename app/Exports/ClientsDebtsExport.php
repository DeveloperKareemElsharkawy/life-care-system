<?php

namespace App\Exports;

use App\Models\SessionRecord;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ClientsDebtsExport implements FromView, WithEvents, WithColumnFormatting
{
    protected $userId;


    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function __construct($userId)
    {
        $this->userId = $userId;
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

        $sessionsRecords = SessionRecord::query()
            ->whereHas('session.user', function ($query) {
                $query->where('user_id', $this->userId);
            })
            ->withCount('attendees')
            ->with('payments','category')
            ->whereHas('attendees')
            ->get();


         return view('exports.client_debts_export', get_defined_vars());
    }
}

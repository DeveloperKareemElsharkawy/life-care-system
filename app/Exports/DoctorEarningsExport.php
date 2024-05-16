<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\Doctor;
use App\Models\DoctorProfitPercentage;
use App\Models\SessionRecord;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class DoctorEarningsExport implements FromView, WithEvents
{
    protected $month;
    protected $doctorId;

    public function __construct($month, $doctorId)
    {
        $this->month = $month;
        $this->doctorId = $doctorId;
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
        $doctorId = $this->doctorId;
        $doctor = Doctor::query()->find($doctorId);

        // Extract month and year from provided month string
        $monthYear = explode('-', $this->month);
        $year = $monthYear[0];
        $month = $monthYear[1];


        $sessionRecords = SessionRecord::query()
            ->has('attendees')
            ->with('attendees', 'category', 'subCategory')
            ->where('doctor_id', $doctorId)
            ->withCount(['attendees' => function ($query) use ($month, $year) {
                $query->whereMonth('date', $month)
                    ->whereYear('date', $year);
            }])
            ->whereHas('attendees', function ($query) use ($month, $year) {
                $query->whereMonth('date', $month)
                    ->whereYear('date', $year);
            })
            ->get();


// Initialize an empty array to store profit for each session record
        $profits = [];

        foreach ($sessionRecords as $sessionRecord) {
            // Load the session relation which in turn loads the user relation
            $sessionRecord->load('session.user');

            // Access user information through the session relation
            $user = $sessionRecord->session->user;

            // Now you can use $user to access user properties
            // For example: $user->name, $user->email, etc.

            $doctorProfitPercentage = DoctorProfitPercentage::query()
                ->where('doctor_id', $doctorId)
                ->where('category_id', $sessionRecord->main_category_id)
                ->first();

            if ($doctorProfitPercentage) {
                $profitPercentage = $doctorProfitPercentage->profit_percentage;
                $sessionRecord->profit_percentage = $profitPercentage;
                $sessionPrice = $sessionRecord->session_price;

                // Calculate profit amount
                $sessionRecord->total = $sessionPrice * $sessionRecord->attendees_count;
                $sessionRecord->profit = (($sessionPrice * $profitPercentage) / 100) * $sessionRecord->attendees_count;
            } else {
                // If profit percentage is not found, set profit to 0
                $sessionRecord->total = 0;
                $sessionRecord->profit = 0;
                $sessionRecord->profit_percentage = 0;
            }

        }


        $examinations = User::query()->where('doctor_id', $doctorId)->get();

        // Now $profits array contains profit for each session record

        // Assuming you're passing the $doctors variable to the view from your controller
        return view('exports.doctor_earnings', [
            'month' => $this->month, // Adjust this query as needed
            'sessionRecords' => $sessionRecords, // Adjust this query as needed
            'doctor' => $doctor, // Adjust this query as needed
            'examinations' => $examinations, // Adjust this query as needed
        ]);
    }
}

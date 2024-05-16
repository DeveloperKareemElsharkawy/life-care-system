<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AttendanceByDayExport;
use App\Exports\AttendanceByMonthExport;
use App\Exports\ClientsDebtsExport;
use App\Exports\CompaniesDailyDebtsExport;
use App\Exports\CompaniesDebtsExport;
use App\Exports\MonthlySuppliesExport;
use App\Exports\SuppliesExport;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\InsuranceCompany;
use App\Models\Session;
use App\Models\SessionRecord;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ExcelSheetController extends Controller
{

    public function attendeesList()
    {
        // Group by day
        $attendancesByDay = Attendance::select(DB::raw('DATE_FORMAT(DATE(date), "%Y-%m-%d") as date'), DB::raw('COUNT(*) as count'))
            ->groupBy('date')
            ->get();

        // Group by month
        $attendanceByMonth = Attendance::select(DB::raw('YEAR(date) as year'), DB::raw('MONTH(date) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('YEAR(date)'), DB::raw('MONTH(date)'))
            ->get();

        return view('admin-panel.sheets.attendance', get_defined_vars());
    }


    public function supplies()
    {
        $dailyIncomes = $this->combinePayments('daily');
        $monthlyIncomes = $this->combinePayments('monthly');

        return view('admin-panel.sheets.supplies', compact('dailyIncomes', 'monthlyIncomes'));
    }

    private function combinePayments($interval)
    {
        $transactions = Transaction::query()->has('session.user')->with('session.user')->get();
        $examinations = User::query()->get();

        $combinedPayments = [];

        foreach ($transactions as $transaction) {
            $date = $interval == 'daily' ? $transaction->date : Carbon::parse($transaction->date)->format('Y-m');
            $combinedPayments = $this->accumulatePayments($combinedPayments, $date, $transaction->payment, $transaction->session->user->contract_type, 'sessions_payments');
        }

        foreach ($examinations as $examination) {
            $date = $interval == 'daily' ? $examination->examination_date : Carbon::parse($examination->examination_date)->format('Y-m');
            $combinedPayments = $this->accumulatePayments($combinedPayments, $date, $examination->examination_price, $examination->contract_type, 'examination_payments');
        }

        return $combinedPayments;
    }

    private function accumulatePayments($payments, $date, $amount, $contractType, $key)
    {
        if (!isset($payments[$date])) {
            $payments[$date] = [
                'sessions_payments' => 0,
                'examination_payments' => 0,
                'cash' => [
                    'sessions_payments' => 0,
                    'examination_payments' => 0,
                ],
                'contract' => [
                    'sessions_payments' => 0,
                    'examination_payments' => 0,
                ],
            ];
        }

        if (!isset($payments[$date][$key])) {
            $payments[$date][$key] = 0;
            $payments[$date]['cash'][$key] = 0;
            $payments[$date]['contract'][$key] = 0;
        }

        if ($contractType == 'cash') {
            $payments[$date]['cash'][$key] += $amount;
        } elseif ($contractType == 'contract') {
            $payments[$date]['contract'][$key] += $amount;
        }

        $payments[$date][$key] += $amount;

        return $payments;
    }


    public function clientDebts()
    {
        $sessionsRecords = SessionRecord::query()
            ->withCount('attendees')
            ->with('payments')
            ->whereHas('attendees')
            ->whereHas('session.user')
            ->get();

        $debts = [];

        foreach ($sessionsRecords as $sessionRecord) {
            $totalPayments = $sessionRecord->payments->sum('payment');
            $totalDebtsForSession = $sessionRecord->sessions_debt_for_client * $sessionRecord->attendees_count;

            if ($totalDebtsForSession > $totalPayments) {
                $user = $sessionRecord->session->user;

                // Check if user exists, if not, initialize it
                if (!isset($debts[$user->id]['total_debts'])) {
                    $debts[$user->id]['total_debts'] = 0;
                }
                if (!isset($debts[$user->id]['user'])) {
                    $debts[$user->id]['user'] = null;
                }
                // Add debts to the user
                $debts[$user->id]['total_debts'] += $totalDebtsForSession - $totalPayments;
                $debts[$user->id]['user'] = User::query()->find($user->id);
            }
        }

        return view('admin-panel.sheets.client_debts', compact('debts'));
    }


    public function downloadSupplies()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = 'daily_earnings_' . $timestamp . '.xlsx';
        return Excel::download(new SuppliesExport(request()->day, request()->type), $filename);
    }

    public function downloadMonthlySupplies()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = 'monthly_earnings_' . $timestamp . '.xlsx';
        return Excel::download(new MonthlySuppliesExport(request()->month, request()->type), $filename);
    }

    public function downloadAttendeesList()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = 'daily_attendence_' . $timestamp . '.xlsx';
        return Excel::download(new AttendanceByDayExport(request()->day), $filename);
    }

    public function downloadMonthlyAttendeesList()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = 'monthly_attendence_' . $timestamp . '.xlsx';
        return Excel::download(new AttendanceByMonthExport(request()->month), $filename);
    }

    public function downloadClientDebts()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = 'client_debts_' . $timestamp . '.xlsx';

        return Excel::download(new ClientsDebtsExport(request()->user_id), $filename);
    }

    public function calculateCompaniesDebts()
    {
        // Retrieve session records with necessary relations and conditions
        $CompaniesSessionRecords = SessionRecord::query()
            ->with([
                'attendees' => function ($query) {
                    // Select only necessary columns for attendees relation
                    $query->select('session_record_id', 'date');
                },
                'session' => function ($query) {
                    // Select only necessary columns for session relation
                    $query->select('id', 'insurance_company_id');
                }
            ])
            ->withCount('attendees')
            ->has('session.insuranceCompany')
            ->get();

        $monthlyStats = [];
        $dailyStats = [];

        foreach ($CompaniesSessionRecords as $record) {
            // Process each attendee of the session
            foreach ($record->attendees as $attendee) {
                // Extract the month and year from attendee's date
                $attendeesDate = $attendee->date->format('Y-m');

                // Initialize monthly statistics if not exists
                if (!isset($monthlyStats[$attendeesDate])) {
                    $monthlyStats[$attendeesDate] = [
                        'companies_count' => 0,
                        'total_sessions_debt' => 0,
                        'attendees_count' => 0 // Add attendees count initialization
                    ];
                }

                // Increment companies count if not already counted for the month
                if (!in_array($record->session->insurance_company_id, $monthlyStats[$attendeesDate])) {
                    $monthlyStats[$attendeesDate]['companies_count']++;
                }

                // Increment attendees count for the month
                $monthlyStats[$attendeesDate]['attendees_count']++;

                // Add session debt to the corresponding month
                $monthlyStats[$attendeesDate]['total_sessions_debt'] += $record->sessions_debt_for_company;
            }
        }

        foreach ($CompaniesSessionRecords as $record) {
            // Process each attendee of the session
            foreach ($record->attendees as $attendee) {
                // Extract the month and year from attendee's date
                $attendeesDate = $attendee->date->format('Y-m-d');

                // Initialize monthly statistics if not exists
                if (!isset($dailyStats[$attendeesDate])) {
                    $dailyStats[$attendeesDate] = [
                        'companies_count' => 0,
                        'total_sessions_debt' => 0,
                        'attendees_count' => 0 // Add attendees count initialization
                    ];
                }

                // Increment companies count if not already counted for the month
                if (!in_array($record->session->insurance_company_id, $dailyStats[$attendeesDate])) {
                    $dailyStats[$attendeesDate]['companies_count']++;
                }

                // Increment attendees count for the month
                $dailyStats[$attendeesDate]['attendees_count']++;

                // Add session debt to the corresponding month
                $dailyStats[$attendeesDate]['total_sessions_debt'] += $record->sessions_debt_for_company;
            }
        }
        $currentMonth = date('Y-m');
        $lastMonth = date('Y-m', strtotime('-1 month'));

        $currentMonthStates = array_values($this->calculateTotalSessionsDebtByMonth($CompaniesSessionRecords, $currentMonth))[0];
        $lastMonthStates = array_values($this->calculateTotalSessionsDebtByMonth($CompaniesSessionRecords, $lastMonth))[0];


        return view('admin-panel.sheets.company_debts', get_defined_vars());
    }


    function calculateTotalSessionsDebtByMonth($sessionRecords, $targetMonth)
    {
        $monthlyStats[$targetMonth] = [
            'month' => $targetMonth,
            'companies_count' => 0,
            'total_sessions_debt' => 0,
            'attendees_count' => 0
        ];

        foreach ($sessionRecords as $record) {
            foreach ($record->attendees as $attendee) {
                $attendeesMonth = $attendee->date->format('Y-m');


                if ($attendeesMonth == $targetMonth) {

                    if (!in_array($record->session->insurance_company_id, $monthlyStats[$targetMonth])) {
                        $monthlyStats[$targetMonth]['companies_count']++;
                    }

                    $monthlyStats[$targetMonth]['attendees_count']++;
                    $monthlyStats[$targetMonth]['total_sessions_debt'] += $record->sessions_debt_for_company;
                }
            }
        }

        return $monthlyStats;
    }


    public function downloadCompaniesDebts()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = 'companies_debts_' . $timestamp . '.xlsx';
        return Excel::download(new CompaniesDebtsExport(request()->month), $filename);
    }

    public function downloadCompaniesDailyDebts()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = 'companies_daily_debts_' . $timestamp . '.xlsx';
        return Excel::download(new CompaniesDailyDebtsExport(request()->day), $filename);
    }
}

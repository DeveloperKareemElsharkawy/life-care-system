<?php

namespace App\Services\Admin\Session;

use App\Models\Attendance;
use App\Models\Session;

class SessionService
{
    /**
     * Get session data based on session ID.
     *
     * @param int $sessionId The ID of the session.
     * @return array Session data.
     */
    public function getSessionData(int $sessionId)
    {
        // Retrieve session with associated transactions
        $session = Session::query()->with('transactions')->findOrFail($sessionId);

        // Calculate total amount paid by clients
        $returnedAmount = $session->transactions
            ->where('type', 'Withdrawal')
            ->pluck('payment')
            ->sum();


        // Calculate total amount paid by clients
        $paidAmount = $session->transactions
                ->where('type', 'Deposit')
                ->pluck('payment')
                ->sum() - $returnedAmount;


        $attendance = Attendance::query()
            ->with('SessionRecord')
            ->where('session_id', $sessionId)
            ->get();

        $totalPayment = $attendance->sum(function ($item) {
            return $item->SessionRecord->sessions_debt_for_client ?? 0;
        });

        $totalCompanyDebt = $attendance->sum(function ($item) {
            return $item->SessionRecord->sessions_debt_for_company ?? 0;
        });

        // Calculate the total required payment by attendees and companies
        $requiredPayment = 0;

        $requiredCompanyPayment = 0;

        // Calculate the available amount for clients and their remaining debt
        $availableAmount = max(0, $paidAmount - $requiredPayment);
        $clientDebtAmount = abs(($paidAmount - $totalPayment) - $returnedAmount);

        // Return session data
        return [
            'total_company_debt' => $totalCompanyDebt,
            'contract_price' => $session->contract_price,
            'company_debt' => $requiredCompanyPayment,
            'client_debt' => abs($totalPayment),
            'paid_amount' => $paidAmount,
            'remaining_for_client' => ($paidAmount - $totalPayment),
        ];
    }

}

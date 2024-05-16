<?php

namespace App\Http\Requests\Admin\Session;

use App\Models\Doctor;
use App\Models\User;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class SessionsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Request()->route()->named('admin.sessions.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.sessions.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'insurance_company_id' => 'nullable|required_if:contract_type,contract|exists:insurance_companies,id',
            'user_id' => 'required|exists:users,id',
            'additional_services' => 'nullable|',
            'additional_services_price' => 'nullable|',
            'doctor_id' => 'nullable|exists:doctors,id',
            'quantity' => 'nullable|integer',
            'uuid' => 'required|unique:sessions,uuid',
            'status' => 'required|',
            'profit_percentage' => 'nullable|numeric',
            'discount_value' => 'nullable|numeric',
            'total_sessions_debt_for_client' => 'nullable|numeric',
            'total_sessions_debt_for_company' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'insurance_company_discount' => 'nullable|numeric',
            'notes' => 'nullable|string',
            'contract_type' => 'required|in:cash,contract',
            'payment_type' => 'nullable|in:cash,visa',
            'sessions' => 'array',
            'sessions.*.main_category_id' => 'required|exists:categories,id',
            'sessions.*.category_id' => 'required|exists:categories,id',
            'sessions.*.sessions_count' => 'required',
            'sessions.*.doctor_id' => 'required',
            'sessions.*.notes' => 'nullable',

//            'main_category_id' => 'required|exists:categories,id',
//            'category_id' => 'required|exists:categories,id',
//            'sessions_count' => 'required|numeric',
//            'session_price' => 'required|numeric',
//            'receipt_number' => 'nullable|required_if:contract_type,cash|string',


        ];

    }

    public function updateRules(): array
    {
        return [
            'insurance_company_id' => 'nullable|required_if:contract_type,contract|exists:insurance_companies,id',
            'user_id' => 'required|exists:users,id',
            'additional_services' => 'nullable|',
            'additional_services_price' => 'nullable|',
            'doctor_id' => 'nullable|exists:doctors,id',
            'status' => 'nullable|',
            'quantity' => 'nullable|integer',
            'profit_percentage' => 'nullable|numeric',
            'discount_value' => 'nullable|numeric',
            'contract_price_before_discount' => 'required|numeric',
            'contract_final_total' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'insurance_company_discount' => 'nullable|numeric',
            'notes' => 'nullable|string',
            'contract_type' => 'required|in:cash,contract',
            'payment_type' => 'nullable|in:cash,visa',

            'sessions' => 'array',
            'sessions.*.main_category_id' => 'required|exists:categories,id',
            'sessions.*.category_id' => 'required|exists:categories,id',
            'sessions.*.sessions_count' => 'required',
            'sessions.*.total' => 'required',
            'sessions.*.doctor_id' => 'required',
            'sessions.*.notes' => 'nullable',
        ];
    }


    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $user = User::query()->find($this->input('user_id'));
        $doctor = Doctor::query()->find($user?->doctor_id);
        $this->merge([
            'contract_type' => $user->insurance_company_id ? 'contract' : 'cash',
            'doctor_id' => $user->doctor_id,
            'insurance_company_id' => $user?->insurance_company_id,
            'uuid' => rand(9000,90000)
        ]);
    }

}

<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
    public function rules(): array
    {
        $rules = [
            'user_id' => 'required|exists:users,id',
            'name' => [
                'required',
                function ($attribute, $value, $fail) {
                    $names = explode(' ', $value);

                    if (count($names) < 4) {
                        $fail('برجاء إدخال الإسم رباعى');
                    }
                },
            ],
            'phone' => 'required|numeric|regex:/^[0-9]{11}$/|unique:users,phone,' . request()->input('user_id'),
            'phone_2' => 'nullable|numeric|regex:/^[0-9]{11}$/|unique:users,phone_2,' . request()->input('user_id'),
            'image' => 'image',
            'referral' => 'required',
            'doctor_id' => 'nullable|exists:doctors,id',
            'age' => 'nullable',
            'examination_date' => 'nullable|date',
            'referral_desc' => 'nullable',
            'address' => 'nullable|min:3',
            'gender' => 'nullable|in:male,female',
            'marital_status' => 'nullable|in:single,married,divorced',
            'contract_type' => 'required|in:cash,contract',
            'examination_price' => 'required|numeric',
            'referral_doctor_id' => 'nullable|exists:doctors,id',
            'examination_notes' => 'nullable|string',
            'insurance_company_id' => 'required|exists:insurance_companies,id',
            'payment_type' => 'required|in:cash,visa,post_paid',
            'doctor_examination_percentage' => 'nullable',
            'category_id' => 'nullable|',

        ];
        if (request()->input('password')) {
            $rules['password'] = ['required', 'min:6']; // to remove it from validated array if empty
        }
        return $rules;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'status' => (bool)$this['status'] == 'on',
            'contract_type' => 'contract',
        ]);
    }
}

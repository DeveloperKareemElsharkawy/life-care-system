<?php

namespace App\Http\Requests\Admin\PaymentMethods;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class PaymentMethodsFormRequest extends FormRequest
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
        if (Request()->route()->named('admin.payment-methods.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.payment-methods.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'status' => 'required|boolean',

        ];
    }

    public function updateRules(): array
    {
        return [
            'paymentMethod_id' => 'required|exists:payment_methods,id',
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'status' => 'required|boolean',
        ];
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
        ]);
    }

}

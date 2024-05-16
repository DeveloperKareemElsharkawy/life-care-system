<?php

namespace App\Http\Requests\Admin\InsuranceCompany;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class InsuranceCompanyRequest extends FormRequest
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
        if (Request()->route()->named('admin.insurance-companies.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.insurance-companies.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name' => 'required|min:3|max:40',
            'image' => 'nullable|image',
            'description' => 'nullable|',
            'email' => 'nullable|email',
            'examination_price' => 'required',
            'mobile' => 'nullable|min:6',
            'address' => 'nullable|min:6',
        ];
    }

    public function updateRules(): array
    {
        return [
            'insurance_company_id' => 'required|exists:insurance_companies,id',
            'insuranceCompany_id' => 'required|exists:insurance_companies,id',
            'name' => 'required|min:3|max:40',
            'image' => 'nullable|image',
            'description' => 'nullable|',
            'email' => 'nullable|email',
            'examination_price' => 'required',
            'mobile' => 'nullable|min:6',
            'address' => 'nullable|min:6',
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
            'insurance_company_id' => $this->route('insurance_company_id'),
            'insuranceCompany_id' => $this->route('insurance_company_id'),
        ]);
    }

}

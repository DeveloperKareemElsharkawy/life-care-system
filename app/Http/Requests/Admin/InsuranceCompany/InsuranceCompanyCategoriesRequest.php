<?php

namespace App\Http\Requests\Admin\InsuranceCompany;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class InsuranceCompanyCategoriesRequest extends FormRequest
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
        if (Request()->route()->named('admin.insurance-company-categories.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.insurance-company-categories.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'insurance_company_id' => 'required|exists:insurance_companies,id',
            'category_id' => 'required|exists:categories,id',
            'main_category_id' => 'required|exists:categories,id',
            'discount_price_value' => 'required',
            'discount_percentage_value' => 'nullable',

        ];
    }

    public function updateRules(): array
    {
        return [
            'insurance_company_id' => 'required|exists:insurance_companies,id',
            'category_id' => 'required|exists:categories,id',
            'main_category_id' => 'required|exists:categories,id',
            'discount_price_value' => 'required',
            'discount_percentage_value' => 'nullable',
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

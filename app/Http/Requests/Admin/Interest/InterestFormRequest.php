<?php

namespace App\Http\Requests\Admin\Interest;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class InterestFormRequest extends FormRequest
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
        if (Request()->route()->named('admin.interests.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.interests.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'status' => 'required',
        ];
    }

    public function updateRules(): array
    {
        return [
            'interest_id' => 'required|exists:interests,id',
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'status' => 'required',
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
            'interest_id' => $this->route('interest_id'),
            'status' => (bool)$this['status'] == 'on',
        ]);
    }

}

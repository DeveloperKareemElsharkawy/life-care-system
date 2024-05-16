<?php

namespace App\Http\Requests\Admin\College;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class CollegeRequest extends FormRequest
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
        if (Request()->route()->named('admin.colleges.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.colleges.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name_ar' => 'required|string|min:7',
            'name_en' => 'required|string|min:7',
            'status' => 'required',
        ];
    }

    public function updateRules(): array
    {
        return [
            'college_id' => 'required|exists:colleges,id',
            'name_ar' => 'required|string|min:7',
            'name_en' => 'required|string|min:7',
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
            'college_id' => $this->route('college_id'),
            'status' => (bool)$this['status'] == 'on',
        ]);
    }

}

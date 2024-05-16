<?php

namespace App\Http\Requests\Admin\Doctors;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class DoctorsRequest extends FormRequest
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
        if (Request()->route()->named('admin.doctors.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.doctors.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name' => 'required|string',
            'image' => 'nullable|string',
            'email' => 'nullable',
            'mobile' => 'nullable',
            'type' => 'required|in:doctor,consultant',
            'categories' => 'required|array',
            'notes' => 'nullable|string',
        ];
    }

    public function updateRules(): array
    {
        return [
            'name' => 'required|string',
            'image' => 'nullable|string',
            'email' => 'nullable',
            'mobile' => 'nullable',
            'type' => 'required|in:doctor,consultant',
            'categories' => 'required|array',
            'notes' => 'nullable|string',
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
            'doctor_id' => $this->route('doctor_id'),
            'type' => 'doctor',
        ]);
    }

}

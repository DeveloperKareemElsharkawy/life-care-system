<?php

namespace App\Http\Requests\Admin\Specialization;

use Illuminate\Foundation\Http\FormRequest;

class SpecializationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Request()->route()->named('admin.specializations.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.specializations.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name' => 'required|min:3',
        ];
    }

    public function updateRules(): array
    {
        return [
            'specialization_id' => 'required|exists:specializations,id',
            'name' => 'required|min:3',
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
            'specialization_id' => $this->route('specialization_id'),
        ]);
    }

}

<?php

namespace App\Http\Requests\Admin\NationalityProcessStep;

use Illuminate\Foundation\Http\FormRequest;

class NationalityProcessStepRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Request()->route()->named('admin.nationality_process_steps.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.nationality_process_steps.update')) {
            return $this->updateRules();
        }
    }

    public function createRules(): array
    {
        return [
            'title' => 'required|unique:nationality_process_steps,title',
            'title.*' => 'required|unique_translation:nationality_process_steps,title',
            'description' => 'nullable',
            'status' => 'required'
        ];
    }

    public function updateRules(): array
    {
        return [
            'nationalityProcessStep_id' => 'required|exists:nationality_process_steps,id',
            'title.*' => 'required|unique_translation:nationality_process_steps,title,' . $this->input('nationalityProcessStep_id'),
            'description' => 'nullable',
            'status' => 'required'
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
            'nationalityProcessStep_id' => $this->route('nationality_process_step_id'),
            'status' => (bool)$this['status'] == 'on' || (bool)$this['status'] == 1 ? 1 : 0,
        ]);
    }

}

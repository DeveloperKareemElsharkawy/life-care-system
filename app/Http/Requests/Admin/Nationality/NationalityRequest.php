<?php

namespace App\Http\Requests\Admin\Nationality;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class NationalityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Request()->route()->named('admin.nationalities.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.nationalities.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name.*' => ['required', UniqueTranslationRule::for('nationalities'),],
            'processSteps' => 'required|array',
        ];
    }

    public function updateRules(): array
    {
        return [
            'nationality_id' => 'required|exists:nationalities,id',
            'name.*' => 'required|unique_translation:nationalities,name,' . $this->input('nationality_id'),
            'processSteps' => 'required|array',
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
//             'status' => (bool)$this['status'] == 'on' || (bool)$this['status'] == 1 ? 1 : 0,
        ]);
    }

}

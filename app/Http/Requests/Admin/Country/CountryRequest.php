<?php

namespace App\Http\Requests\Admin\Country;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Request()->route()->named('admin.countries.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.countries.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name.*' => ['required', UniqueTranslationRule::for('countries'),],
        ];
    }

    public function updateRules(): array
    {
        return [
            'country_id' => 'required|exists:countries,id',
            'name.*' => 'required|unique_translation:countries,name,' . $this->input('country_id'),
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
            'country_id' => $this->route('country_id'),
        ]);
    }

}

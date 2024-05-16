<?php

namespace App\Http\Requests\Admin\Pile;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class PileTypeRequest extends FormRequest
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
        if (Request()->route()->named('admin.pile-types.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.pile-types.update')) {
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
            'pileType_id' => 'required|exists:pile_types,id',
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

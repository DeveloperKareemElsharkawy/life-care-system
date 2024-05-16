<?php

namespace App\Http\Requests\Admin\Club;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class ClubFormRequest extends FormRequest
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
        if (Request()->route()->named('admin.clubs.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.clubs.update')) {
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
            'club_id' => 'required|exists:clubs,id',
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
            'club_id' => $this->route('club_id'),
            'status' => (bool)$this['status'] == 'on',
        ]);
    }

}

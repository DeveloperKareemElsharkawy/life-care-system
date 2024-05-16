<?php

namespace App\Http\Requests\Admin\Pile;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class PileNotificationsRequest extends FormRequest
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
        if (Request()->route()->named('admin.pile-notifications.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.pile-notifications.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'pile_id' => 'required|exists:piles,id',
            'subject' => 'required|string|min:3',
            'body' => 'required|string|min:3',


        ];
    }

    public function updateRules(): array
    {
        return [
            'subject' => 'required|string|min:3',
            'body' => 'required|string|min:3',
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
        ]);
    }

}

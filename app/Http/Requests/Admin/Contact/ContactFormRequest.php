<?php

namespace App\Http\Requests\Admin\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
        return [
            'first_name' => 'required|min:3|max:40',
            'last_name' => 'required|min:3|max:40',
            'email' => 'required|email',
            'phone' => 'required|',
            'user_id' => 'required|',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function prepareForValidation()
    {
        $this->merge([
            'contact_id' => $this->route('contact_id'),
            'user_id' => $this->route('user_id'),
        ]);
    }
}

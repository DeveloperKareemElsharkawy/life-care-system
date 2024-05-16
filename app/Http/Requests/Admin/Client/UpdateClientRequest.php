<?php

namespace App\Http\Requests\Admin\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
    public function rules()
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|min:3|max:40',
            'direct_manager' => 'required|min:3|max:40',
            'email' => 'required|email|unique:clients,email,' . request()->input('client_id'),
            'primary_mobile_number' => 'required|unique:clients,primary_mobile_number,' . request()->input('client_id'),
            'secondary_mobile_number' => 'required|unique:clients,secondary_mobile_number,' . request()->input('client_id'),
            'address' => 'required|min:10|max:100',
            'value_added_tax' => 'required|min:1|numeric',
            'three_percent_tax' => 'required|boolean',
            'image' => 'sometimes|image',
            'destinations.*.from_where' => 'required|min:5|max:100',
            'destinations.*.to_where' => 'required|min:5|max:100',
            'destinations.*.price' => 'required|numeric|min:1|max:100000',
        ];
    }


    protected function prepareForValidation(): void
    {
        $this->merge([
            'three_percent_tax' => (bool)$this->three_percent_tax,
            'destinations' => !$this->destinations ?: array_values($this->destinations),
        ]);
    }

}

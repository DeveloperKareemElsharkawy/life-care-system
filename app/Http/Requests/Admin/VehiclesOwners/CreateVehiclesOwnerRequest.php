<?php

namespace App\Http\Requests\Admin\VehiclesOwners;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehiclesOwnerRequest extends FormRequest
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
        return [
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:vehicles_owners,email',
            'mobile' => 'required|phone_number_eg|unique:vehicles_owners,mobile',
            'image' => 'required|image',
            'password' => 'required|min:6',
        ];
    }
}

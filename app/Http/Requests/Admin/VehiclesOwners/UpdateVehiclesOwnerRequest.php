<?php

namespace App\Http\Requests\Admin\VehiclesOwners;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UpdateVehiclesOwnerRequest extends FormRequest
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
        $rules = [
            'VehicleOwner_id' => 'exists:owners,id',
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:owners,email,' . request()->input('VehicleOwner_id'),
            'mobile' => 'required|phone_number_eg|unique:owners,mobile,' . request()->input('VehicleOwner_id'),
            'image' => 'image',
        ];

        if (request()->input('password')) {
            $rules['password'] = ['required', 'min:6']; // to remove it from validated array if empty
        }

        return $rules;

    }

}

<?php

namespace App\Http\Requests\Admin\VehiclesTypes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UpdateVehiclesTypeRequest extends FormRequest
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
            'VehicleType_id' => 'exists:vehicle_types,id',
            'name' => 'required|min:3|max:40',
        ];
    }

}

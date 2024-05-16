<?php

namespace App\Http\Requests\Admin\Driver;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UpdateDriverRequest extends FormRequest
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
            'driver_id' => 'exists:drivers,id',
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:drivers,email,' . request()->input('driver_id'),
            'mobile' => 'required|phone_number_eg|unique:drivers,mobile,' . request()->input('driver_id'),
            'image' => 'image',
        ];

        if (request()->input('password')) {
            $rules['password'] = ['required', 'min:6']; // to remove it from validated array if empty
        }

        return $rules;

    }

}

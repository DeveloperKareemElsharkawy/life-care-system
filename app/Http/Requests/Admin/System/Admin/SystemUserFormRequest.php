<?php

namespace App\Http\Requests\Admin\System\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SystemUserFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Request()->route()->named('admin.system.users.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.system.users.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:admins,email',
            'mobile' => 'required|phone_number_qa|unique:admins,mobile',
            'image' => 'sometimes|image',
            'roles' => 'required|array',
            'roles.*' => 'required|exists:roles,id',
            'password' => 'required|min:6',
        ];
    }

    public function updateRules(): array
    {
        $rules = [
            'admin_id' => 'exists:admins,id',
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email,' . request()->input('admin_id'),
            'mobile' => 'required|phone_number_qa|unique:users,mobile,' . request()->input('admin_id'),
            'image' => 'image',
            'roles' => 'required|array',
            'roles.*' => 'required|exists:roles,id',

        ];

        if (request()->input('password')) {
            $rules['password'] = ['required', 'min:6']; // to remove it from validated array if empty
        }

        return $rules;
    }


    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'status' => (bool)$this['status'] == 'on' || (bool)$this['status'] == 1 ? 1 : 0,
            'password' => $this['password'] ? $this['password'] : null,
        ]);
    }

    public function messages()
    {
        return [
            'phone_number_qa' => 'The :attribute must be a valid Qatar phone number',
        ];
    }

}

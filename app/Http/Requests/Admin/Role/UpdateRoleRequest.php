<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'role_id' => 'exists:roles,id',
            'display_name' => 'nullable|max:255|unique:roles,display_name,' . request()['role_id'],
            'name' => 'nullable|max:255|unique:roles,name,' . request()['role_id'],
            'description' => 'nullable|unique:roles,description,' . request()['role_id'],
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
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

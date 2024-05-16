<?php

namespace App\Http\Requests\Admin\Notifications;

use App\Rules\Admin\Worker\CheckExperience;
use Illuminate\Foundation\Http\FormRequest;

class SendNotificationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'details' => 'required|string|max:255',
            'clients' => 'nullable|array',
            'clients.*' => 'nullable|exists:users,id',
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
            'status' => (bool)$this['status'] == 'on' || (bool)$this['status'] == 1 ? 1 : 0,
        ]);
    }

}

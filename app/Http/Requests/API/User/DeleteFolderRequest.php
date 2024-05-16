<?php

namespace App\Http\Requests\API\User;

use App\Rules\API\User\OldPassword;
use Illuminate\Foundation\Http\FormRequest;

class DeleteFolderRequest extends FormRequest
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
        return [
            'folder_id' => 'required|exists:folders,id',
        ];
    }
}
<?php

namespace App\Http\Requests\API\Piles;

use Illuminate\Foundation\Http\FormRequest;

class DeletePileRequest extends FormRequest
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
            'pile_id' => 'required|exists:piles,id',

        ];
    }


}

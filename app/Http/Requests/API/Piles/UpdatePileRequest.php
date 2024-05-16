<?php

namespace App\Http\Requests\API\Piles;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePileRequest extends FormRequest
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
            'user_id' => 'required|',
            'name' => 'required|',
            'name_ar' => 'string|',
            'name_en' => 'string|',

            'content' => 'required|',
            'content_ar' => 'string|',
            'content_en' => 'string|',

            'image' => 'nullable|image',
            'video' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm',

            'status' => 'required|in:open,pending,closed,canceled',
            'pile_type_id' => 'required|exists:pile_types,id',
            'folder_id' => 'required|exists:folders,id',
            'dead_line' => 'required|date',
            'event_date' => 'required|date',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return string
     */
    public function username(): string
    {
        return (filter_var(request()['username'], FILTER_VALIDATE_EMAIL)) ? 'email' : 'phone';
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth('api')->user()->id,
            'name_ar' => $this->input('name'),
            'name_en' => $this->input('name'),

            'content_ar' => $this->input('content'),
            'content_en' => $this->input('content'),
        ]);
    }
}

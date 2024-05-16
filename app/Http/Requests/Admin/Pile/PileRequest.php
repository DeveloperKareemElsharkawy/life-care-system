<?php

namespace App\Http\Requests\Admin\Pile;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class PileRequest extends FormRequest
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
        if (Request()->route()->named('admin.piles.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.piles.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [

            'name_ar' => 'required|',
            'name_en' => 'required|',

            'content_ar' => 'required|',
            'content_en' => 'required|',

            'clients' => 'required|array',
            'clients.*.id' => 'required|exists:users,id',
            'clients.*.is_manager' => 'required|in:0,1',
            'clients.*.folder_id' => 'required|',

            'image' => 'sometimes|image',
            'video' => 'sometimes|mimes:mp4,ogx,oga,ogv,ogg,webm',


            'status' => 'required',
            'pile_type_id' => 'required',
            'dead_line' => 'required|date',
            'event_date' => 'required|date',
        ];
    }

    public function updateRules(): array
    {
        return [

            'name_ar' => 'required|',
            'name_en' => 'required|',

            'content_ar' => 'required|',
            'content_en' => 'required|',

            'clients' => 'required|array',
            'clients.*.id' => 'required|exists:users,id',
            'clients.*.is_manager' => 'required|in:0,1',
            'clients.*.folder_id' => 'required|',

            'image' => 'sometimes|image',
            'video' => 'sometimes|mimes:mp4,ogx,oga,ogv,ogg,webm',


            'status' => 'required',
            'pile_type_id' => 'required',
            'dead_line' => 'required|date',
            'event_date' => 'required|date',

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
            'pile_id' => $this->route('pile_id'),
        ]);
    }

}

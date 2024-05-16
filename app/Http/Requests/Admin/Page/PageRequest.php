<?php

namespace App\Http\Requests\Admin\Page;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
        if (Request()->route()->named('admin.pages.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.pages.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'title.*' => ['required', UniqueTranslationRule::for('pages'),],
            'content.*' => ['required', UniqueTranslationRule::for('pages'),],
        ];
    }

    public function updateRules(): array
    {
        return [
            'page_id' => 'required|exists:pages,id',
            'title.*' => 'required|unique_translation:pages,title,' . $this->input('page_id'),
            'content.*' => 'required|unique_translation:pages,content,' . $this->input('page_id'),
//            'images' => 'required',

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
            'page_id' => $this->route('page_id'),
        ]);
    }

}

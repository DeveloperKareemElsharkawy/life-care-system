<?php

namespace App\Http\Requests\Admin\Category;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
        if (Request()->route()->named('admin.categories.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.categories.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'status' => 'required|boolean',

        ];
    }

    public function updateRules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|min:3',
            'status' => 'required|boolean',
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

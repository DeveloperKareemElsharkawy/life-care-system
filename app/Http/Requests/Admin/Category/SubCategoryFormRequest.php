<?php

namespace App\Http\Requests\Admin\Category;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class SubCategoryFormRequest extends FormRequest
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
        if (Request()->route()->named('admin.sub-categories.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.sub-categories.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name' => 'required|string|min:1',
            'code' => 'required|string|min:1',
            'price' => 'required|string|min:1',
            'parent_id' => 'required|exists:categories,id',

        ];
    }

    public function updateRules(): array
    {
        return [
            'name' => 'required|string|min:1',
            'code' => 'required|string|min:1',
            'price' => 'required|string|min:1',
            'parent_id' => 'required|exists:categories,id',
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

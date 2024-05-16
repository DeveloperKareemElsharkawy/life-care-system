<?php

namespace App\Http\Requests\Admin\Tag;

use Illuminate\Foundation\Http\FormRequest;

class TagsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
        if (Request()->route()->named('admin.tags.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.tags.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name' => 'required|unique:categories,name',
            'status' => 'required|boolean',
        ];
    }

    public function updateRules(): array
    {
        return [
            'tag_id' => 'required|exists:tags,id',
            'name' => 'required|unique:tags,name,' . $this->input('tag_id'),
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

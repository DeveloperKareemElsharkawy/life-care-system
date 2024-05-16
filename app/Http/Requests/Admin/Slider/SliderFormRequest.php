<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Request()->route()->named('admin.slider.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.slider.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'title.en' => 'required|unique_translation:sliders,title',
            'title.ar' => 'required|unique_translation:sliders,title',
            'description.en' => 'required|unique_translation:sliders,description',
            'description.ar' => 'required|unique_translation:sliders,description',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'target' => 'required|string',
            'url' => 'required_if:target,url',
            'category' => 'required_if:target,category|exists:categories,id',
            'worker' => 'required_if:target,worker|exists:workers,id',
        ];
    }

    public function updateRules(): array
    {
        return [
            'slider_id' => 'required|exists:sliders,id',
            'title.*' => 'required|unique_translation:sliders,title,' . $this->input('slider_id'),
            'description.*' => 'required|unique_translation:sliders,description,' . $this->input('slider_id'),
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'target' => 'required|string',
            'url' => 'required_if:target,url|string',
            'category' => 'required_if:target,category|exists:categories,id',
            'worker' => 'required_if:target,worker|exists:workers,id',
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
            'slider_id' => $this->route('slider_id'),
        ]);
    }

}

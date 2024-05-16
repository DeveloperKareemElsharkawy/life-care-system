<?php

namespace App\Http\Requests\Admin\Worker;

use App\Rules\Admin\Worker\CheckExperience;
use Illuminate\Foundation\Http\FormRequest;

class WorkerFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Request()->route()->named('admin.workers.store')) {
            return $this->createRules();
        } elseif (Request()->route()->named('admin.workers.update')) {
            return $this->updateRules();
        }
    }


    public function createRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'experience' => 'required|integer',
            'gender' => 'required|in:male,female',
            'marital_status' => 'required|in:single,divorced,married',
            'nationality_id' => 'required|exists:nationalities,id',
            'category_id' => 'required|exists:categories,id',
            'additional_skills' => 'required|array',
            'additional_skills.*' => 'required|exists:categories,id',
            'no_of_children' => 'required|numeric',
            'religion' => 'required|in:muslim,christian,buddhist,hindu,other',
            'place_of_birth' => 'required|min:3|max:255',
            'living_town' => 'required|min:3|max:255',
            'passport_number' => 'required|numeric|unique:workers,passport_number',
            'release_date' => 'required|date',
            'expiry_date' => 'required|date',
            'place_of_issue' => 'required|min:3|max:255',
            'scientific_degree' => 'required|min:3|max:255',
            'languages' => 'required|array',
            'languages.*' => 'required|min:3|max:255',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'skin_colour' => 'required|min:3|max:255',
            'salary' => 'required|numeric',
            'contract_full' => 'required|numeric',
            'face_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'worker_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'worker_experience' => ['nullable', 'array', new CheckExperience()],
            'worker_experience.*.country_id' => 'required|exists:countries,id',
            'worker_experience.*.start_date' => 'required|date',
            'worker_experience.*.end_date' => 'required|date',
            'video_url' => 'nullable|file|mimes:mp4,mov,ogg,qt,webm,flv,avi,wmv,mpg,mpeg|max:20048',
            'employment_status' => 'required|boolean',
            'location_status' => 'required|boolean',
            'status' => 'required|boolean',
        ];
    }

    public function updateRules(): array
    {
        return [
            'worker_id' => 'required|exists:workers,id',
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'experience' => 'required|integer',
            'gender' => 'required|in:male,female',
            'marital_status' => 'required|in:single,divorced,married',
            'nationality_id' => 'required|exists:nationalities,id',
            'category_id' => 'required|exists:categories,id',
            'additional_skills' => 'required|array',
            'additional_skills.*' => 'required|exists:categories,id',
            'no_of_children' => 'required|numeric',
            'religion' => 'required|in:muslim,christian,buddhist,hindu,other',
            'place_of_birth' => 'required|min:3|max:255',
            'living_town' => 'required|min:3|max:255',
            'passport_number' => 'required|numeric|unique:workers,passport_number,' . $this->input('worker_id'),
            'release_date' => 'required|date',
            'expiry_date' => 'required|date',
            'place_of_issue' => 'required|min:3|max:255',
            'scientific_degree' => 'required|min:3|max:255',
            'languages' => 'required|array',
            'languages.*' => 'required|min:3|max:255',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'skin_colour' => 'required|min:3|max:255',
            'salary' => 'required|numeric',
            'contract_full' => 'required|numeric',
            'face_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'worker_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'worker_experience' => ['required', 'array', new CheckExperience()],
            'worker_experience.*.country_id' => 'required|exists:countries,id',
            'worker_experience.*.start_date' => 'required|date',
            'worker_experience.*.end_date' => 'required|date',
            'video_url' => 'nullable|file|mimes:mp4,mov,ogg,qt,webm,flv,avi,wmv,mpg,mpeg|max:20048',
            'employment_status' => 'required|boolean',
            'location_status' => 'required|boolean',
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
        $birthday = $this['dob'];

        $dob = strtotime(str_replace("/", "-", $birthday));
        $tdate = time();

        $this->merge([
            'age' => date('Y', $tdate) - date('Y', $dob),
            'status' => (bool)$this['status'] == 'on' || (bool)$this['status'] == 1 ? 1 : 0,
            'employment_status' => (bool)$this['employment_status'] == 'on' || (bool)$this['employment_status'] == 1 ? 1 : 0,
            'location_status' => (bool)$this['location_status'] == 'on' || (bool)$this['location_status'] == 1 ? 1 : 0,

        ]);
    }

}

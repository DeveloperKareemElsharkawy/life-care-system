<?php

namespace App\Http\Resources\API\Worker;

use App\Http\Resources\API\Category\CategoryResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $user = auth('api')->user();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'images' => [$this->faceImageUrl, $this->workerImageUrl],
            'age' => $this->age,
            'no_of_children' => $this->no_of_children,
            'religion' => trans('admin/datatable.' . $this->religion),
            'gender' => trans('admin/datatable.' . $this->gender),
            'marital_status' => trans('admin/datatable.' . $this->marital_status),
            'nationality' => $this->nationality->name,
            'job' => new CategoryResource($this->job),
            'additional_skills' => CategoryResource::collection($this->additional_skills),
            'is_favorite' => $user && $this->hasBeenFavoritedBy($user),
            'salary' => $this->salary,
            'currency' => 'usd',
            'languages' => $this->languages(),
            'workerExperience' => WorkerExperienceResource::collection($this->workerExperience),
        ];
    }

    public function languages(): \Illuminate\Support\Collection
    {
        $languages = collect($this->languages);

        return $languages->map(function ($language) {
            return trans('admin/datatable.' . $language);
        });

    }
}

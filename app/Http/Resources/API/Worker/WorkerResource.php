<?php

namespace App\Http\Resources\API\Worker;

use App\Http\Resources\API\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
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
            'image_url' => $this->faceImageUrl,
            'age' => $this->age,
            'nationality' => $this->nationality->name,
            'job' => new CategoryResource($this->job),
            'additional_skills' =>  CategoryResource::collection($this->additional_skills),
            'is_favorite' => $user && $this->hasBeenFavoritedBy($user),
        ];
    }

}

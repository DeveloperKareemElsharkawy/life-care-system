<?php

namespace App\Http\Resources\API\Worker;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'country' => $this->country->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}

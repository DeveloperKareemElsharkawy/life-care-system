<?php

namespace App\Http\Resources\API\Slider;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class SliderResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->imageUrl,

            'target' => $this->target,
            'url' => $this->url,
            'worker_id' => $this->worker_id,
            'category_id' => $this->category_id,
        ];
    }
}

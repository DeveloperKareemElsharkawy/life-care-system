<?php

namespace App\Http\Resources\API\Category;

use App\Enums\CategoryColor;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {


        return [
            'id' => $this->id,
            'name' => $this->name,
            'color' => $this->color,
            'color_code' => CategoryColor::getColor($this->color),
            'imageUrl' => $this->imageUrl,
            'workers_count' => count($this->workers),
        ];
    }
}

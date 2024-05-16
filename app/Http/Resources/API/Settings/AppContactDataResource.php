<?php

namespace App\Http\Resources\API\Settings;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppContactDataResource extends JsonResource
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
            'latitude' => floatval($this['latitude']),
            'longitude' => floatval($this['longitude']),
            'building' => $this['building'],
            'address' => $this['address'],
            'email' => $this['email'],
            'mobile' => $this['mobile'],
        ];
    }
}

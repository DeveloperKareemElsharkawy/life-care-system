<?php

namespace App\Http\Resources\API\User;

use App\Http\Resources\API\Location\StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'image' => $this->imageUrl,
            'state' => new StateResource($this->state),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

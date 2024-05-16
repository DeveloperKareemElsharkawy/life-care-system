<?php

namespace App\Http\Resources\API\Pile;

use App\Http\Resources\API\User\UserFolderResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name_ar' => $this->name_ar,
            'name_en,' => $this->name_en,
            'content_ar,' => $this->content_ar,
            'content_en,' => $this->content_en,
            'image,' => $this->image_url,
            'video,' => $this->video_url,
            'pile_type,' => new PileTypeResource($this->pileType),
            'members,' =>  PileMembersResource::collection($this->PileClients),
            'dead_line,' => $this->dead_line,
            'event_date,' => $this->event_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}

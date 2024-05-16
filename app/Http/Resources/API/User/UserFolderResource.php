<?php

namespace App\Http\Resources\API\User;

use App\Http\Resources\API\Location\StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserFolderResource extends JsonResource
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
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,

            'can_be_deleted' => $this->CanBeDeleted(),
            'piles_count' => count($this->piles),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }


    public function CanBeDeleted()
    {
        if (in_array($this->folder_type,['personal','invite']) || count($this->piles) > 0){
            return false;
        }
        return true;
    }
}

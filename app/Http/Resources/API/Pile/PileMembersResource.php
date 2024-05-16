<?php

namespace App\Http\Resources\API\Pile;

use App\Http\Resources\API\User\UserFolderResource;
use App\Http\Resources\API\User\UserResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PileMembersResource extends JsonResource
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
            'user' => new UserResource($this->client),
            'folder,' => new UserFolderResource($this->folder),
            'is_manager' => (bool)$this->is_manager,
        ];
    }
}

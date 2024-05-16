<?php

namespace App\Http\Resources\API\Settings;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppSocialsLinksResource extends JsonResource
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
            'app_facebook' => $this['facebook_link'],
            'app_twitter' => $this['twitter_link'],
            'app_instagram' => $this['instagram_link'],
            'app_linkedin' => $this['linkedin_link'],
        ];
    }
}

<?php

namespace App\Http\Resources\API\Order;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdersIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'order_number' => $this->order_number,
            'worker' => $this->worker->name,
            'status' => $this->status,
            'notes' => $this->notes,
            'date' => $this->created_at->format('Y-m-d'),
        ];
    }
}

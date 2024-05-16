<?php

namespace App\Http\Resources\API\Order;

use App\Http\Resources\API\Worker\WorkerDetailsResource;
use App\Http\Resources\API\Worker\WorkerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
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
            'order_number' => $this->order_number,
            'worker' => new WorkerResource($this->worker),
            'date' => $this->created_at->format('Y-m-d'),
            'status' => $this->status,
            'notes' => $this->notes->map(function ($note) {
                return [
                    'id' => $note->id,
                    'note' => $note->note,
                    'date' => $note->created_at->format('Y-m-d'),
                ];
            }),
            'processes' => $this->processes->map(function ($process) {
                return [
                    'id' => $process->id,
                    'process' => $process->process->title,
                    'status' => $process->status,
                    'date' => $process->created_at->format('Y-m-d'),
                ];
            }),
        ];
    }
}

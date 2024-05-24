<?php

namespace App\Http\Resources;

use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        [$lat, $lng] = explode(',', $this->destination);

        return [
            'id' => $this->id,
            'status' => OrderStatus::from($this->status)->label(),
            'product' => ProductResource::make($this->product),
            'destination' => [
                'lat' => $lat,
                'lng' => $lng
            ],
            'count' => $this->count,
            'price' => $this->price,
            'is_not_accepted' => !$this->isSent()
        ];
    }
}

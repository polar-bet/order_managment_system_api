<?php

namespace App\Http\Resources;

use App\Enums\MessageStatus;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'content' => $this->content,
            'is_read' => MessageStatus::isRead($this->status),
            'is_owner' => $this->user_id === auth()->user()->id
        ];
    }
}

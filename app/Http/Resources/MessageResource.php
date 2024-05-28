<?php

namespace App\Http\Resources;

use App\Enums\MessageStatus;
use App\Models\Message;
use Carbon\Carbon;
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
            'id' => $this->id,
            'content' => $this->content,
            'chat_id' => $this->chat->id,
            'is_read' => MessageStatus::isRead($this->status),
            'is_owner' => $this->isOwner(),
            'created_at' => $this->created_at->format('H:i')
        ];
    }
}

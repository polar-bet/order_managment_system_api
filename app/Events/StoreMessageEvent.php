<?php

namespace App\Events;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;

class StoreMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(private Message $message)
    {
    }

    public function broadcastAs(): string
    {
        return 'store_message';
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('user.' . $this->message->user->id),
            new Channel('chat.' . $this->message->chat->id),
        ];
    }

    public function broadcastWith(): array
    {
        return MessageResource::make($this->message)->resolve();
    }
}

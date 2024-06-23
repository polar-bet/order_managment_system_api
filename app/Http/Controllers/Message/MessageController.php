<?php

namespace App\Http\Controllers\Message;

use App\Events\DeleteMessageEvent;
use App\Models\Chat;
use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\Message\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Services\Message\MessageService;
use Illuminate\Support\Facades\Gate;

class MessageController extends Controller
{
    public function __construct(private MessageService $service)
    {
    }

    public function store(MessageRequest $request, Chat $chat)
    {
        Gate::authorize('create', [Message::class, $chat]);

        return MessageResource::make($this->service->store($request, $chat));
    }

    public function update(MessageRequest $request, Chat $chat, Message $message)
    {
        Gate::authorize('update', $message);

        return MessageResource::make($this->service->update($request, $message));
    }

    public function destroy(Message $message)
    {
        Gate::authorize('delete', $message);

        broadcast(new DeleteMessageEvent($message->chat->id, $message->id, $message->chat->interlocutor()->id))->toOthers();

        $message->delete();

        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers\Message;

use App\Models\Chat;
use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\Message\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Services\Message\MessageService;

class MessageController extends Controller
{
    public function __construct(private MessageService $service)
    {
    }

    public function store(MessageRequest $request, Chat $chat)
    {
        return MessageResource::make($this->service->store($request, $chat));
    }

    public function update(MessageRequest $request, Chat $chat, Message $message)
    {
        return MessageResource::make($this->service->update($request, $message));
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return response()->noContent();
    }
}

<?php

namespace App\Services\Message;

use App\Models\Chat;
use App\Models\Message;
use App\Enums\MessageStatus;
use App\Events\StoreMessageEvent;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Message\MessageRequest;

class MessageService
{
    public function store(MessageRequest $request, Chat $chat)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        $data['status'] = MessageStatus::SENT->value;

        $message = $chat->messages()->create($data);

        broadcast(new StoreMessageEvent($message, $message->chat->interlocutor()->id))->toOthers();

        Log::info('Message created and event fired', ['message' => $message]);

        return $message;
    }

    public function update(MessageRequest $request, Message $message)
    {
        $data = $request->validated();

        $message->update($data);

        return $message;
    }
}

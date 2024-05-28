<?php

namespace App\Services\Message;

use App\Enums\MessageStatus;
use App\Events\StoreMessageEvent;
use App\Http\Requests\Message\MessageRequest;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class MessageService
{
    public function store(MessageRequest $request, Chat $chat)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        $data['status'] = MessageStatus::SENT->value;

        $message = $chat->messages()->create($data);

        event(new StoreMessageEvent($message));

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

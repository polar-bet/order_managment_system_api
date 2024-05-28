<?php

namespace App\Services\Chat;

use App\Events\StoreChatEvent;
use App\Models\Chat;

class ChatService
{
    public function index()
    {
        return auth()->user()->chats;
    }

    public function store($user)
    {
        if (auth()->user()->chats()->whereHas('users', fn ($query) => $query->where('users.id', $user->id))->exists()) {
            return;
        }


        $chat = auth()->user()->chats()->create();

        $chat->users()->attach($user->id);

        event(new StoreChatEvent($chat->interlocutor()));
    }
}

<?php

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::routes(['middleware' => ['auth:sanctum']]);

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('chat.{recipientId}', function ($user, $recipientId) {
    return (int) $user->id === (int) $recipientId;
});

Broadcast::channel('order.{recipientId}', function ($user, $recipientId) {
    return (int) $user->id === (int) $recipientId;
});

Broadcast::channel('active_users', function ($user) {
    return $user;
});

// Broadcast::channel('chat.{chat}', function (User $user, Chat $chat) {
//     return $user->chats->contains($chat->id);
//     // return $user->isBelongsToChat($chat);
// });

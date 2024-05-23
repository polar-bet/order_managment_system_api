<?php

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });
Broadcast::routes(['middleware' => ['auth:sanctum']]);

Broadcast::channel('user-status', function ($user) {
    return true;
});

Broadcast::channel('chat.{chat}', function (User $user, Chat $chat) {
    return $user->isBelongsToChat($chat);
});

<?php

namespace App\Http\Controllers\Chat;

use App\Events\DeleteChatEvent;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChatResource;
use App\Services\Chat\ChatService;

class ChatController extends Controller
{
    public function __construct(private ChatService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ChatResource::collection($this->service->index());
    }


    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        return ChatResource::make($chat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        event(new DeleteChatEvent($chat->id, $chat->interlocutor()->id));

        $chat->delete();

        return response()->noContent();
    }
}

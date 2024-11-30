<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewMessageNotification;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(Request $request, $chatId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $chat = Chat::findOrFail($chatId);

        Message::create([
            'chat_id' => $chat->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        if ($chat->user1_id == Auth::id()) {
            $ontvangerID = $chat->user2_id;
        } else {
            $ontvangerID = $chat->user1_id;
        }
        $ontvanger = User::findOrFail($ontvangerID);
        Mail::to($ontvanger->email)->send(new NewMessageNotification($message));

        return redirect()->route('chats.show', $chat->id);
    }
}

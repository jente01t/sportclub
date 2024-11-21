<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::where('user1_id', Auth::id())
            ->orWhere('user2_id', Auth::id())
            ->get();

        return view('chats.index', compact('chats'));
    }

    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('chats.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $chat = Chat::create([
            'user1_id' => Auth::id(),
            'user2_id' => $request->user_id,
        ]);

        return redirect()->route('chats.show', $chat->id);
    }

    public function show($id)
    {
        $chat = Chat::with('messages.user')->findOrFail($id);
        return view('chats.show', compact('chat'));
    }
}

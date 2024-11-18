<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $newsId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'news_id' => $newsId,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('news.show', $newsId)->with('status', 'Comment added successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::orderBy('published_at', 'desc')->get();

        return view('news.index', compact('newsItems'));
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);

        return view('news.show', compact('newsItem'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('news', 'public');

        News::create([
            'title' => $request->title,
            'image_path' => $imagePath,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('news.index')->with('status', 'News item created successfully.');
    }

    public function edit($id)
    {
        $newsItem = News::findOrFail($id);

        return view('news.edit', compact('newsItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        $newsItem = News::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($newsItem->image_path);

            $imagePath = $request->file('image')->store('news', 'public');
        } else {
            $imagePath = $newsItem->image_path;
        }

        $newsItem->update([
            'title' => $request->title,
            'image_path' => $imagePath,
            'content' => $request->content,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('news.index')->with('status', 'News item updated successfully.');
    }

    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);

        Storage::disk('public')->delete($newsItem->image_path);

        $newsItem->delete();

        return redirect()->route('news.index')->with('status', 'News item deleted successfully.');
    }
}

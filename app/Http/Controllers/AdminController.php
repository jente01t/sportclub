<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\News;
use App\Models\FaqCategory;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function newsIndex(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $newsItems = News::where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->orderBy('published_at', 'desc')
                ->get();
        } else {
            $newsItems = News::orderBy('published_at', 'desc')->get();
        }

        return view('admin.news.index', compact('newsItems', 'query'));
    }

    public function promoteToAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'admin';
        $user->save();

        return redirect()->route('admin.users.index')->with('status', 'User promoted to admin.');
    }

    public function demoteToUser($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'user';
        $user->save();

        return redirect()->route('admin.users.index')->with('status', 'Admin demoted to user.');
    }

    public function createUser()
    {
        return view('admin.users.create-user');
    }

    public function storeUser(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $fotoPath = $request->file('foto')->store('foto', 'public');

        Profile::create([
            'user_id' => $user->id,
            'birthday' => $request->birthday,
            'bio' => $request->bio,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('users.index')->with('status', 'User created successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = $request->input('query');
        $query2 = $request->input('query2');

        if ($query) {
            $users = User::where('name', 'like', "%{$query}%")->get();
        } else {
            $users = User::all();
        }

        if ($query2) {
            $newsItems = News::where('title', 'like', "%{$query2}%")
                ->orWhere('content', 'like', "%{$query2}%")
                ->orderBy('published_at', 'desc')
                ->get();
        } else {
            $newsItems = News::orderBy('published_at', 'desc')->get();
        }

        return view('admin.dashboard', compact('users', 'newsItems', 'query', 'query2'));
    }

    public function promoteToAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'admin';
        $user->save();

        return redirect()->route('admin.dashboard')->with('status', 'User promoted to admin.');
    }

    public function demoteToUser($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'user';
        $user->save();

        return redirect()->route('admin.dashboard')->with('status', 'Admin demoted to user.');
    }

    public function createUser()
    {
        return view('admin.create-user');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin',
            'birthday' => 'required|date',
            'bio' => 'required|string',
            'foto' => 'required',
        ]);

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

        return redirect()->route('admin.dashboard')->with('status', 'User created successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function dashboard(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $users = User::where('name', 'like', "%{$query}%")->get();
        } else {
            $users = User::all();
        }

        return view('admin.dashboard', compact('users', 'query'));
    }

    /**
     * Promote a user to admin.
     */
    public function promoteToAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'admin';
        $user->save();

        return redirect()->route('admin.dashboard')->with('status', 'User promoted to admin.');
    }

    /**
     * Demote an admin to user.
     */
    public function demoteToUser($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'user';
        $user->save();

        return redirect()->route('admin.dashboard')->with('status', 'Admin demoted to user.');
    }

    /**
     * Show the form for creating a new user.
     */
    public function createUser()
    {
        return view('admin.create-user');
    }

    /**
     * Store a newly created user in storage.
     */
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

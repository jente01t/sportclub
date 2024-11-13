<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $users = User::where('name', 'like', "%{$query}%")->get();
        } else {
            $users = User::all();
        }

        return view('admin.users.index', compact('users', 'query'));
    }
}

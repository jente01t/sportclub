<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;
use App\Models\User;
use App\Models\Sport;

class ProfileController extends Controller
{
    public function show($id): View
    {
        $user = User::with('profile')->findOrFail($id);

        return view('profile.show', [
            'user' => $user,
        ]);
    }

    public function edit(Request $request, $id): View
    {
        $user = User::with('profile')->findOrFail($id);

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $fotoPath = $foto->storeAs('foto', $fotoName, 'public');
        } else {
            $fotoPath = $user->profile->foto;
        }

        $user->profile->update([
            'birthday' => $request->input('birthday'),
            'bio' => $request->input('bio'),
            'foto' => $fotoPath,
        ]);

        return Redirect::route('profile.edit', ['id' => $user->id])->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function search(Request $request): View
    {
        $query = $request->input('query');

        if ($query) {
            $profiles = Profile::whereHas('user', function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })->get();
        } else {
            $profiles = Profile::with('user')->get();
        }

        return view('profile.search', [
            'profiles' => $profiles,
        ]);
    }
}

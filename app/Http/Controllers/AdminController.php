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
use App\Models\ContactForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

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

    public function contactIndex()
    {
        $contactForms = ContactForm::all();
        return view('admin.contact.index', compact('contactForms'));
    }

    public function contactShow($id)
    {
        $contactForm = ContactForm::findOrFail($id);
        return view('admin.contact.show', compact('contactForm'));
    }

    public function contactReply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $contactForm = ContactForm::findOrFail($id);

        Mail::to($contactForm->email)->send(new ContactMessage(
            $contactForm->name,
            'admin@example.com',
            $contactForm->message,
            $contactForm->created_at,
            $request->reply
        ));

        $contactForm->update(['answered' => true]);

        return redirect()->route('admin.contact.contactIndex')->with('status', 'Reply sent successfully.');
    }
}

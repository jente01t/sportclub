<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('contact.index', compact('user'));
    }

    public function store(ContactRequest $request)
    {
        $contactForm = ContactForm::create($request->validated());

        Mail::to('admin@example.com')->send(new ContactMessage(
            $request->name,
            $request->email,
            $request->message,
            $contactForm->created_at
        ));

        return redirect()->route('contact.index')->with('status', 'Your message has been sent successfully.');
    }
}

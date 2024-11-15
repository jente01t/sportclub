<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\FaqCategory;
use App\Http\Requests\FaqRequest;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //maak de index voor de gewone users
    public function indexUser()
    {
        $faqs = Faq::orderBy('created_at', 'desc')->get();
        $categories = FaqCategory::with('faqs')->get();

        return view('faqs.index', compact('faqs', 'categories'));
    }

    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $faqs = Faq::where('question', 'like', "%{$query}%")
                ->orWhere('answer', 'like', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $faqs = Faq::orderBy('created_at', 'desc')->get();
        }

        $categories = FaqCategory::with('faqs')->get();

        return view('admin.faqs.index', compact('faqs', 'categories', 'query'));
    }

    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.faqs.create', compact('categories'));
    }

    public function store(FaqRequest $request)
    {
        Faq::create($request->validated());

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    public function update(FaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ deleted successfully.');
    }
}

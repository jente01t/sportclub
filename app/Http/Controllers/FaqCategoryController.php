<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Http\Requests\FaqCategoryRequest;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::all();
        return view('admin.faq-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.faq-categories.create');
    }

    public function store(FaqCategoryRequest $request)
    {
        FaqCategory::create($request->validated());

        return redirect()->route('admin.faq-categories.index')->with('status', 'Category created successfully.');
    }

    public function edit(FaqCategory $faqCategory)
    {
        return view('admin.faq-categories.edit', compact('faqCategory'));
    }

    public function update(FaqCategoryRequest $request, FaqCategory $faqCategory)
    {
        $faqCategory->update($request->validated());

        return redirect()->route('admin.faq-categories.index')->with('status', 'Category updated successfully.');
    }

    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();

        return redirect()->route('admin.faq-categories.index')->with('status', 'Category deleted successfully.');
    }
}

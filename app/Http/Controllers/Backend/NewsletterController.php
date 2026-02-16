<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    //

    public function index()
    {
        $newsletters = Newsletter::latest()->paginate(10);
        return view('admin.newsletter-management.index', compact('newsletters'));
    }

    public function create()
    {
        return view('admin.newsletter-management.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create($request->only('email'));

        return redirect()->route('newsletters.index')
            ->with('success', 'Newsletter subscription added successfully.');
    }

    public function show(Newsletter $newsletter)
    {
        return view('admin.newsletter-management.show', compact('newsletter'));
    }

    public function edit(Newsletter $newsletter)
    {
        return view('admin.newsletter-management.edit', compact('newsletter'));
    }

    public function update(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email,' . $newsletter->id,
        ]);

        $newsletter->update($request->only('email'));

        return redirect()->route('newsletters.index')
            ->with('success', 'Newsletter subscription updated successfully.');
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        return redirect()->route('newsletters.index')
            ->with('success', 'Newsletter subscription deleted successfully.');
    }


    public function newsletterSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create($request->only('email'));

        return redirect()->route('index')
            ->with('success', 'Newsletter subscription added successfully.');
    }
}

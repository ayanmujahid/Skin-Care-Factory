<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    //
    public function index()
    {
        $inquiries = Inquiry::latest()->paginate(10);
        return view('admin.inquiry-management.index', compact('inquiries'));
    }

    public function create()
    {
        return view('admin.inquiry-management.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Inquiry::create($request->all());

        return redirect()->route('inquiries.index')
            ->with('success', 'Inquiry created successfully.');
    }

    public function show(Inquiry $inquiry)
    {
        return view('admin.inquiry-management.index', compact('inquiry'));
    }

    public function edit(Inquiry $inquiry)
    {
        return view('admin.inquiry-management.edit', compact('inquiry'));
    }

    public function update(Request $request, Inquiry $inquiry)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $inquiry->update($request->all());

        return redirect()->route('inquiries.index')
            ->with('success', 'Inquiry updated successfully.');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();

        return redirect()->route('inquiries.index')
            ->with('success', 'Inquiry deleted successfully.');
    }



    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Inquiry::create($request->all());

        return redirect()->route('index')
            ->with('success', 'Inquiry created successfully.');
    }
}

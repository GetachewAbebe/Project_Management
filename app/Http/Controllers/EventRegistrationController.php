<?php

namespace App\Http\Controllers;

use App\Models\ReviewRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventRegistrationController extends Controller
{
    /**
     * Show the public registration form.
     */
    public function create()
    {
        return view('events.national_review_2026.register');
    }

    /**
     * Store a new registration.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'gender' => 'required|string|in:Male,Female',
            'organization' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'qualification' => 'required|string|in:PhD,MSc,BSc',
            'specialization' => 'required|string|max:255',
            'presentation_title' => 'required|string|max:500',
            'abstract_text' => 'required|string|min:50',
            'abstract_file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
            'available_on_date' => 'required|string|in:Yes,No',
            'discovery_source' => 'required|string',
            'support_letter' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'questions' => 'nullable|string|max:1000',
        ]);

        // Production-Ready: Duplicate Prevention
        $exists = ReviewRegistration::where('email', $validated['email'])
            ->where('full_name', $validated['full_name'])
            ->exists();

        if ($exists) {
            return back()->withErrors(['email' => 'This participant is already registered for the 8th National Review.'])->withInput();
        }

        if ($request->hasFile('abstract_file')) {
            $validated['abstract_file_path'] = $request->file('abstract_file')->store('events/national_review_2026/abstracts', 'public');
        }

        if ($request->hasFile('support_letter')) {
            $validated['support_letter_path'] = $request->file('support_letter')->store('events/national_review_2026/support_letters', 'public');
        }

        $validated['reference_code'] = 'BETI-2026-'.strtoupper(Str::random(6));
        $validated['status'] = 'pending';

        $registration = ReviewRegistration::create($validated);

        return redirect()->route('event.confirmation', $registration->reference_code);
    }

    /**
     * Show the confirmation page.
     */
    public function confirmation($reference)
    {
        $registration = ReviewRegistration::where('reference_code', $reference)->firstOrFail();

        return view('events.national_review_2026.confirmation', compact('registration'));
    }

    /**
     * Show the results page (Admin only).
     */
    public function results()
    {
        // This will be protected by middleware in routes/web.php
        $registrations = ReviewRegistration::latest()->get();

        return view('events.national_review_2026.results', compact('registrations'));
    }
}

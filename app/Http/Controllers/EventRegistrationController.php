<?php

namespace App\Http\Controllers;

use App\Models\ReviewRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventRegistrationController extends Controller
{
    /**
     * Show the public landing page for the National Review 2026.
     */
    public function landing()
    {
        $stats = null;
        if (auth()->check() && auth()->user()->isAdmin()) {
            $stats = [
                'total' => ReviewRegistration::count(),
                'today' => ReviewRegistration::whereDate('created_at', now()->today())->count(),
                'male' => ReviewRegistration::where('gender', 'Male')->count(),
                'female' => ReviewRegistration::where('gender', 'Female')->count(),
                'pending' => ReviewRegistration::where('status', 'pending')->count(),
            ];
        }

        return view('events.national_review_2026.landing', compact('stats'));
    }

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
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'qualification' => 'required|string|in:PhD,MSc,BSc',
            'expertise' => 'required|string|max:255',
            'previous_attendance' => 'required|string',
            'presentation_title' => 'required|string|max:500',
            'project_status' => 'required|string',
            'abstract_text' => 'required_without:abstract_file|nullable|string|min:50',
            'abstract_file' => 'required_without:abstract_text|nullable|file|mimes:pdf,doc,docx|max:10240',
            'thematic_area' => 'required|string',
            'available_on_date' => 'required|string|in:Yes,No',
            'presentation_ppt' => 'nullable|file|mimes:ppt,pptx|max:20480',
            'support_letter' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'travel_option' => 'required|string',
            'needs_hotel' => 'required|string',
            'discovery_source' => 'required|string',
            'inviter_name' => 'required_if:discovery_source,Invited Directly|nullable|string|max:255',
            'questions' => 'nullable|string|max:1000',
            'extra_titles' => 'nullable|array',
            'extra_titles.*' => 'required|string|max:500',
            'extra_statuses' => 'nullable|array',
            'extra_statuses.*' => 'required|string',
        ]);

        // Production-Ready: Duplicate Prevention
        $exists = ReviewRegistration::where('email', $validated['email'])
            ->where('full_name', $validated['full_name'])
            ->exists();

        if ($exists) {
            return back()->withErrors(['email' => 'This participant is already registered for the 8th National Review.'])->withInput();
        }

        // File Storage
        if ($request->hasFile('abstract_file')) {
            $validated['abstract_file_path'] = $request->file('abstract_file')->store('events/national_review_2026/abstracts', 'public');
        }

        if ($request->hasFile('presentation_ppt')) {
            $validated['presentation_ppt_path'] = $request->file('presentation_ppt')->store('events/national_review_2026/presentations', 'public');
        }

        if ($request->hasFile('support_letter')) {
            $validated['support_letter_path'] = $request->file('support_letter')->store('events/national_review_2026/support_letters', 'public');
        }

        // Process Additional Projects
        if (! empty($validated['extra_titles'])) {
            $extra = [];
            foreach ($validated['extra_titles'] as $index => $title) {
                $extra[] = [
                    'title' => $title,
                    'status' => $validated['extra_statuses'][$index] ?? 'New',
                ];
            }
            $validated['extra_projects'] = $extra;
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

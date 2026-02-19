<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationConfirmed;
use App\Models\ReviewRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EventRegistrationController extends Controller
{
    /**
     * Show the public landing page for the National Research Review 2026.
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
        $messages = [
            'email.unique' => 'This identity is already associated with an active registration for the 8th National Research Review.',
            'full_name.required' => 'The Participant Full Identity is mandatory for registry records.',
            'abstract_text.required_without' => 'Please provide the Scientific Abstract to proceed with your submission.',
            'abstract_text.min' => 'The Scientific Abstract must contain at least 50 characters to meet peer-review standards.',
            'abstract_file.required_without' => 'An Abstract Document (PDF/Doc) must be uploaded if the text field is empty.',
            'qualification.required' => 'Highest Academic Qualification is required for scientific classification.',
            'available_on_date.in' => 'Please confirm your availability for the duration of the National Research Review.',
            'discovery_source.required' => 'Information regarding how you discovered the event is required for logistical analytics.',
            'inviter_name.required_if' => 'The name of the colleague or official who invited you is required for direct-invite participants.',
        ];

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
        ], $messages);

        // Production-Ready: Duplicate Prevention
        $exists = ReviewRegistration::where('email', $validated['email'])
            ->where('full_name', $validated['full_name'])
            ->exists();

        if ($exists) {
            return back()->withErrors(['email' => 'This identity is already associated with an active registration for the 8th National Research Review.'])->withInput();
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

        // Notify Participant
        try {
            Mail::to($registration->email)->send(new RegistrationConfirmed($registration));
        } catch (\Exception $e) {
            // Log mail failure but don't block registration
            \Illuminate\Support\Facades\Log::error('Mail failed: '.$e->getMessage());
        }

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
        $registrations = ReviewRegistration::latest()->get();

        return view('events.national_review_2026.results', compact('registrations'));
    }

    /**
     * Show the participant's data (Self-Service).
     */
    public function show($reference)
    {
        $registration = ReviewRegistration::where('reference_code', $reference)->firstOrFail();

        return view('events.national_review_2026.show', compact('registration'));
    }

    /**
     * Show the edit form for a participant (Self-Service).
     */
    public function edit($reference)
    {
        $registration = ReviewRegistration::where('reference_code', $reference)->firstOrFail();

        return view('events.national_review_2026.edit', compact('registration'));
    }

    /**
     * Update participant documents (Self-Service).
     */
    public function update(Request $request, $reference)
    {
        $registration = ReviewRegistration::where('reference_code', $reference)->firstOrFail();

        $validated = $request->validate([
            'presentation_ppt' => 'nullable|file|mimes:ppt,pptx|max:20480',
            'support_letter' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);

        if ($request->hasFile('presentation_ppt')) {
            // Delete old if exists (Optional)
            $validated['presentation_ppt_path'] = $request->file('presentation_ppt')->store('events/national_review_2026/presentations', 'public');
        }

        if ($request->hasFile('support_letter')) {
            $validated['support_letter_path'] = $request->file('support_letter')->store('events/national_review_2026/support_letters', 'public');
        }

        $registration->update($validated);

        return back()->with('success', 'Documents updated successfully! Reference: '.$reference);
    }
}

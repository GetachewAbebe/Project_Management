<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewFeedbackController extends Controller
{
    /**
     * Show the feedback form.
     */
    public function create()
    {
        return view('events.national_review_2026.feedback');
    }

    /**
     * Store feedback submission.
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'organization' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'event_rating' => 'required|integer|between:1,5',
            'logistics_rating' => 'required|integer|between:1,5',
            'technical_rating' => 'required|integer|between:1,5',
            'comments' => 'nullable|string|max:2000',
            'future_attendance' => 'nullable|string|max:255',
        ]);

        \App\Models\ReviewFeedback::create($validated);

        return redirect()->route('event.landing')->with('success', 'Thank you for your valuable feedback! Your submission helps us improve the National Research Review.');
    }
}

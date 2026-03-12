<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = \App\Models\ReviewFeedback::latest()->paginate(20);
        return view('events.national_review_2026.feedback_results', compact('feedbacks'));
    }

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

        $feedback = \App\Models\ReviewFeedback::create($validated);

        try {
            \Illuminate\Support\Facades\Mail::to($feedback->email)->send(new \App\Mail\ReviewFeedbackMail($feedback));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Feedback Mail Error: ' . $e->getMessage());
        }

        return redirect()->route('event.landing')->with('feedback_success', true);
    }
}

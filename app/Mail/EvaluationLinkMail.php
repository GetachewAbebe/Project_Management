<?php

namespace App\Mail;

use App\Models\EvaluationAssignment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class EvaluationLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public $assignment;
    public $url;

    /**
     * Create a new message instance.
     */
    public function __construct(EvaluationAssignment $assignment)
    {
        $this->assignment = $assignment;
        $this->url = route('evaluate.public', $assignment->token);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Project Evaluation Request - BETIn',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.evaluation_link',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

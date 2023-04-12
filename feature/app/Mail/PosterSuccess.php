<?php

namespace App\Mail;

use App\Models\Abstractsubmission;
use App\Models\Poster;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PosterSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $abstractsubmissionSuccess;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Abstractsubmission $abstractsubmissionSuccess)
    {
        $this->abstractsubmissionSuccess = $abstractsubmissionSuccess;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'MEAVC - Confirmation of Abstract Submission',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.success',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

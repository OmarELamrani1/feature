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

class PosterStored extends Mailable
{
    use Queueable, SerializesModels;

    public $abstractsubmission;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Abstractsubmission $abstractsubmission)
    {
        $this->abstractsubmission = $abstractsubmission;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'abstractsubmission Stored',
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
            view: 'emails.poster',
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

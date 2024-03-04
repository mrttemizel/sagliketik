<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationStoreMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;


    public function __construct($subject)
    {
        $this->  subject = $subject;

    }

    /**
     * Get the message envelope.
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Website Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('backend.email.application')->with(
            [
                'subject' => $this->  subject
            ]
        );
    }
}

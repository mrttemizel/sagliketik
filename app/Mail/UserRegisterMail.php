<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserRegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject, $body;

    /**
     * Create a new message instance.
     */
    public function __construct($subject,$body)
    {
        $this->  subject = $subject;
        $this->  body =    $body;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->  subject,
        );
    }

    public function build()
    {
        return $this->view('backend.email.user-register-email')->with(
            [
                'subject' => $this->  subject
            ]
        );
    }



}

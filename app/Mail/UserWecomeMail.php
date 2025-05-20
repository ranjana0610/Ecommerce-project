<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserWecomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

        public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to Melanin!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'frontend.welcome',
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

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $admin_message;
    public function __construct($subject,$admin_message)
    {
        $this->subject = $subject;
        $this->admin_message = $admin_message;
    }


    public function envelope()
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.userEmail',
        );
    }


    public function attachments()
    {
        return [];
    }
}

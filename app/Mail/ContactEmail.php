<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactUs;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $contact;

    public function __construct( $contact )
    {
        $this->contact = $contact;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Contact Email',
        );
    }


    public function content()
    {
        return new Content(
            view: 'mail.contactus',
        );
    }

    public function attachments()
    {
        return [];
    }
}

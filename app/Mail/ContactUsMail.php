<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $message;

    public function __construct($data)
    {
        $this->name = $data['full_name'];
        $this->email = $data['email'];
        $this->message = $data['details'];
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Business Transformation Inquiry',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-us',
        );
    }
}
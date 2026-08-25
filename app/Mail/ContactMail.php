<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        $name = $this->data['name'] ?? 'Cliente';
        $service = $this->data['service_label'] ?? 'Consulta';

        return new Envelope(
            subject: "📸 Nuevo mensaje de {$name} · {$service} | Studio Katracho",
            replyTo: [
                new Address($this->data['email'], $this->data['name'])
            ]
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_html',
        );
    }
}

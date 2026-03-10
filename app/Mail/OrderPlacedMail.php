<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Email subject
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Order Received',
        );
    }

    /**
     * Email view
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order',
            with: [
                'order' => $this->order
            ],
        );
    }

    /**
     * Attachments
     */
    public function attachments(): array
    {
        return [];
    }
}
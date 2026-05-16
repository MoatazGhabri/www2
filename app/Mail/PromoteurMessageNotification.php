<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\PromoteurMessage;
use App\Models\PromoteurProperty;

class PromoteurMessageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $property;

    /**
     * Create a new message instance.
     */
    public function __construct(PromoteurMessage $message, PromoteurProperty $property)
    {
        $this->message = $message;
        $this->property = $property;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau message concernant votre propriété - ' . $this->property->ref,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.promoteur-message-notification',
            with: [
                'message' => $this->message,
                'property' => $this->property,
            ],
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

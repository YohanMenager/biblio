<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class notification extends Mailable
{
    use Queueable, SerializesModels;

    private string $user;
    private string $ouvrage;

    /**
     * Create a new message instance.
     */
    public function __construct($unUser, $unOuvrage)
    {
        $this->user=$unUser;
        $this->ouvrage=$unOuvrage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre livre est prêt',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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


    /**

     * Build the message.

     *

     * @return $this

     */

     public function build()
    {
        return $this->view('admin.reservations.mail')
                    ->with([
                        'user' => $this->user,
                        'ouvrage' => $this->ouvrage,
                    ]);
    }
}

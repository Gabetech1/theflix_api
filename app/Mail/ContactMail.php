<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build(){
        return $this->view('email.sendContact')
        ->subject($this->data['subject'])
        ->with([
            'data' => $this->data,
        ])
        ->from($this->data['admin_email'], $this->data['site_name']);

    }

    /**
     * Get the message envelope.
     */
    /* public function envelope(): Envelope
    {
        return new Envelope(

            from: new Address('admin@flixshipping.com', 'Flix Shipping'),
            subject: 'Contact Form',
        );
    } */

    /**
     * Get the message content definition.
     */
   /*  public function content(): Content
    {
        return new Content(
            view: 'email.sendContact',
            with: [
                'subject' => $this->data->subject
            ]
        );
    } */

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
   /*  public function attachments(): array
    {
        return [];
    } */
}
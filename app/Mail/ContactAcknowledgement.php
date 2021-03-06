<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAcknowledgement extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $school;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact, $school)
    {
        $this->contact = $contact;
        $this->school = $school;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Enquiry Acknowledgement')->replyTo($this->school['email'])->from($this->school['email'], $this->contact['name'])->markdown('mails.ContactAcknowledgement');

    }
}

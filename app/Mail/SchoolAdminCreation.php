<?php

namespace App\Mail;

use App\School;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SchoolAdminCreation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $school;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $school, $password)
    {
        $this->user = $user;
        $this->school = $school;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Administrative Role Assignment')->replyTo(env('MAIL_SUPPORT'))->from(env('MAIL_SUPPORT'), 'Pensuh')->markdown('mails.schooladmin');
    }
}

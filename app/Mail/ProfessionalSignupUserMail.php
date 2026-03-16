<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ProfessionalSignupUserMail extends Mailable
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Your Professional Account Request')
            ->view('emails.professional_user');
    }
}
<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ProfessionalSignupAdminMail extends Mailable
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('New Professional Registration')
            ->view('emails.professional_admin');
    }
}
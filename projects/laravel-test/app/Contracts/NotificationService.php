<?php

namespace app\Contracts;

use App\Mail\UserWelcomeMail;
use Illuminate\Contracts\Mail\Mailer;

class NotificationService
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendWelcomeEmail($user)
    {
        $this->mailer->to($user->email)->send(new UserWelcomeMail($user));
    }
}

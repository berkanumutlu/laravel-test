<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller implements ShouldQueue
{
    public function sendMail()
    {
        $details = [
            'title' => 'Mail from My Application',
            'body'  => 'This is a test mail from My Application.'
        ];

        //Mail::to('recipient@example.com')->send(new WelcomeMail($details));
        //Mail::to('recipient@example.com')->queue(new WelcomeMail($details))
        
        /*$message = (new OrderShipped($order))
                        ->onConnection('sqs')
                        ->onQueue('emails');
        Mail::to($request->user())
            ->cc($moreUsers)
            ->bcc($evenMoreUsers)
            ->queue($message);*/

        //Mail::to('recipient@example.com')->later(now()->addMinutes(2), new WelcomeMail($details));
        Mail::to('recipient@example.com')->later(now()->addMinutes(2), new OrderShipped());

        return 'Mail sent successfully';
    }
}

<?php

namespace App\Listeners;

use App\Events\UserHasRegistered;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserEmail
{
    private $mailer;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserHasRegistered  $event
     * @return void
     */
    public function handle(UserHasRegistered $event)
    {
        $user = $event->user;
        $data = [];
        $this->mailer->queue('emails.register', $data, function(Message $m) use($user) {
            $m->from('yoda@the9grounds.com', 'Critgamer');
            $m->to($user->email)->subject('Thanks for registering!');
        });
    }
}

<?php

namespace App\Listeners;

use App\Mail\UserCreated;
use App\Events\CreatedUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailCreatedUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreatedUser  $event
     * @return void
     */
    public function handle(CreatedUser $event)
    {
        Log::info("Email send.");

        // Mail::to($event->user['email'])->send(new UserCreated($event->user));
    }
}

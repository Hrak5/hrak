<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserPasswordUpdateEvent;
use Log;

class UserPasswordUpdateListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserPasswordUpdateEvent $event)
    {
        // dd($event->user);
        Log::info('USER_PASSWORD_UPDATE',[
            'id' => $event->user->id, 
            'user_email' => $event->user->email,
            'user_name' => $event->user->name,
        ]);
    }
}

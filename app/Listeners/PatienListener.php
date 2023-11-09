<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\NotificationX;
use Illuminate\Http\Client\Request;

class PatienListener
{
    /**
     * Create the event listener.
     *@param object
     * @return void
     */
    public function __construct()
    {
        
    }

    public function handle($event)
    {
        // ->except($event->patient->userr_id)

        // $user = User::find($event->patient->userr_id);
        // $user->notify(new NotificationX($event->patient));

        $user = User::find(5);
        $user->notify(new NotificationX($event->patient));

        $user = User::find(auth()->id());
        $user->notify(new NotificationX($event->patient));
    }
}

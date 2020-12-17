<?php

namespace App\Listeners;

use App\User;
use App\Follower;
use App\Mail\PostCreated;
use App\Events\PostCreateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostCreatedNotification;

class PostCreatedListener
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
     * @param  =PostCreatedEvent  $event
     * @return void
     */
    public function handle(PostCreateEvent $event)
    {
        $admin = User::where('id','!=' , $event->post->author_id)->get();
        $followers = Follower::where('user_id',$event->post->author_id)->get();
        
        foreach ($followers as $follower) {
            \Mail::to($follower->email)->send(new PostCreated($event->post));
        };

        Notification::send($admin,new PostCreatedNotification($event->post));
    }
}

<?php

namespace App\Listeners;

use App\Events\PostCreatedEvent;

class RemoveBlockedWords
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
     * @param \App\Events\PostCreatedEvent $event
     * @return void
     */
    public function handle(PostCreatedEvent $event)
    {
        $post = $event->post;

        $post->title = str_replace(['doof'], ['****'], strtolower($post->title));
        $post->save();
    }
}

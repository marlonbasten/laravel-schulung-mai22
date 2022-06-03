<?php

namespace App\Observers;

use App\Mail\PostCreatedMail;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param \App\Models\Post $post
     * @return void
     */
    public function creating(Post $post)
    {
        $post->title = str_replace(['doof'], ['****'], strtolower($post->title));
    }

    public function created(Post $post)
    {
        Mail::to('blabla@test.de')->send(new PostCreatedMail($post));
    }
}

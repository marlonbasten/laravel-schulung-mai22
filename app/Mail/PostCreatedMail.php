<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class PostCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Post $post)
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $image = Storage::disk($this->post->file_disk)->path($this->post->file_path);
        return $this->view('mails.postCreated', ['post' => $this->post])->attach($image);
    }
}

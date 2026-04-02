<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBlogNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $blog;

    /**
     * Create a new message instance.
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;

    }

    /**
     * Build the message.
     */
//    public function build()
//    {
//
//        return $this->subject('📰 New Blog: ' . $this->blog->title)
//            ->view('emails.new_blog');
//    }

    public function build()
    {
        $email = $this->view('emails.new_blog', [
            'blog' => $this->blog,
        ]);

        if ($this->blog->image) {
            $email->attach(public_path($this->blog->image), [
                'as' => basename($this->blog->image),
                'mime' => 'image/png', // Adjust based on your image type
            ]);
        }

        return $email;
    }
}

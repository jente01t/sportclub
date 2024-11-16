<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messageContent;
    public $replyContent;
    public $created_at;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $messageContent, $created_at, $replyContent = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageContent = $messageContent;
        $this->created_at = $created_at;
        $this->replyContent = $replyContent;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $email = $this->view('emails.contact-message')
                      ->subject('Contact Form Submission')
                      ->from($this->email, $this->name);

        if ($this->replyContent) {
            $email->with('replyContent', $this->replyContent);
        }

        return $email->with('created_at', $this->created_at);
    }
}

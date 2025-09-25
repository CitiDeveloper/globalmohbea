<?php

// app/Mail/NewsletterSubscribed.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscribed extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Welcome to MOBHEA Adventures Newsletter!')
            ->view('emails.newsletter_subscribed');
    }
}

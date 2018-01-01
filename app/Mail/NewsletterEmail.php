<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Newsletter;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $newsletter;

    /**
     * NewsletterEmail constructor.
     * @param Newsletter $newsletter
     */
    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->from('newsletter@hoboflyfishing.com', 'Hobo Fly Newsletter')->subject('Hobo Fly News ' . date('F, Y'))->view('mail.newsletter', ['date' => date('F, Y')]);
    }
}

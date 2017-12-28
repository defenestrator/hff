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
        $this->middleware('dev');
        $this->newsletter = $newsletter;
    }

    /**
     * @param $id
     * @return $this
     */
    public function build($id)
    {
        return $this->view('mail.newsletter', ['newsletter' => $this->newsletter->whereId($id), 'date' => date('Y-m-d')]);
    }
}

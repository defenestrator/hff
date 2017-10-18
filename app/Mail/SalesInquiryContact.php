<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SalesInquiryContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * SalesInquiryContact constructor.
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.sales-inquiry')
            ->with([
                'data' => $this->contact
            ]);
    }
}

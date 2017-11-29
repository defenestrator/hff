<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\NewsletterSubscription;

class NewsletterSubscriptionConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $subscription;

    /**
     * NewsletterSubscriptionConfirmation constructor.
     * @param NewsletterSubscription $subscription
     */
    public function __construct(NewsletterSubscription $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.confirm-newsletter-subscription')
            ->with([
                'url'=> url('/newsletter-subscription/' . $this->subscription->token)
            ]);
    }
}

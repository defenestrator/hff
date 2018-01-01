<?php

namespace App\Http\Controllers;

use App\Newsletter;
use App\NewsletterSubscription;
use Illuminate\Http\Request;
use App\Mail\NewsletterEmail;

class NewsletterController extends ContentController
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('cms.newsletters');
    }

    /**
     * @param NewsletterSubscription $subscription
     * @param $id
     */
    public function send(NewsletterSubscription $subscription, $id)
    {
        $subscribers = $subscription->whereConfirmed(true)->pluck('email_address');
        return $this->email->to($subscribers)->send(new NewsletterEmail($id));
    }
}

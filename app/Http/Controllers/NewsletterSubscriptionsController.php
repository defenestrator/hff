<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsletterSubscription;
class NewsletterSubscriptionsController extends Controller
{
    /**
     * Contact form processing.
     * @param Request $request
     * @return Redirect
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        if(NewsletterSubscription::where('email_address', '=', $request->email)->pluck('email_address')->first() == $request->email) {
            return $request->email;
        };
        return NewsletterSubscription::create([
            'email_address' => $request->email
        ]);
    }
}

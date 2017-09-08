<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'email'                 => 'required|email'
        ]);

        // Data to be used on the email view
        $data = array(
            'contact-name' => 'Hobo Newsletter Subscriber',
            'contact-email' => $request->get('email'),
            'contact-msg' => 'Please sign me up for your newsletter!',
        );

        // Send the activation code through email
        Mail::send('emails.contact', compact('data'), function ($m) use ($data) {
            $m->from($data['contact-email'], $data['contact-name']);
            $m->to('support@mg.hoboflyfishing.com', @trans('general.site_name'));
            $m->subject('Received a mail from ' . $data['contact-name']);
        });

        //Redirect to contact page
        return view('index')->with('success', 'Thanks for signing up!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactFormMessage;
use Illuminate\Support\Facades\Lang;

class ContactFormController extends Controller
{
    public function create(Request $request)
    {
        // Data to be used on the email view
        $request->validate([
            'contact-name' => 'required|min:2',
            'contact-email' => 'required|email',
            'contact-msg' => 'required|min:7'
        ]);

        if (env(! 'testing')) {
            $request->validate([
                'g-recaptcha-response' => 'required|recaptcha'
            ]);
        }
        // Save the message to DB
        ContactFormMessage::create([
            'name' => $request
                ->get('contact-name'),
            'email_address' => $request->get('contact-email'),
            'message' => $request->get('contact-msg'),
        ]);

        if (response('error')) {
            return redirect('contact')->withInput()->with('errors', $this->error);
        }
        return view('index')->with('success', 'We will get back to you as quick as we can!');
    }
}

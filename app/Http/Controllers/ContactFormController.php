<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactFormMessage;
use Illuminate\Support\Facades\Lang;
use App\Mail\ContactFormNotification;
use Illuminate\Contracts\Mail\Mailer;

class ContactFormController extends Controller
{
    private $mail;

    public function __construct(Mailer $mail)
    {
        return $this->mail = $mail;
    }
    public function create(Request $request)
    {
        // Data to be used on the email view
        $request->validate([
            'contact-name' => 'required|min:2',
            'contact-email' => 'required|email',
            'contact-msg' => 'required|min:7'
        ]);

        // Save the message to DB
        $data = ContactFormMessage::create([
            'name' => $request
                ->get('contact-name'),
            'email_address' => $request->get('contact-email'),
            'message' => $request->get('contact-msg'),
        ]);

        $this->mail->to('support@mg.hoboflyfishing.com')->queue(new ContactFormNotification($data));
        return view('thanks')->with('message', 'We will get back to you as quick as we can!');
    }
}

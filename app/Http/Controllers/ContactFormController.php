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
            'contact-name' => 'required',
            'contact-email' => 'required|email',
            'contact-msg' => 'required|min:8',
        ]);

        // Send the activation code through email
        ContactFormMessage::create([
            'name' => $request->get('contact-name'),
            'email_address' => $request->get('contact-email'),
            'message' => $request->get('contact-msg'),
        ]);

        //Redirect to contact page
        return redirect('contact')->with('success', Lang::get('auth/message.contact.success'));
    }
}

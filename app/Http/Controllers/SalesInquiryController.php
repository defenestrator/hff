<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;
use App\Mail\SalesInquiryContact;
use Illuminate\Contracts\Mail\Mailer;
class SalesInquiryController extends Controller
{
    private $mail;
    public function __construct(Mailer $mail)
    {
        return $this->mail = $mail;
    }
    /**
     * Contact form processing.
     * @param Request $request
     * @return Redirect
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'email' => 'bail|required|email|min:6|max:255',
            'message' => 'required|min:8|max:640',
        ]);

//        if (config('app.env') !== 'testing') {
//            $this->validate($request, [
//                'g-recaptcha-response' => 'required|recaptcha'
//            ]);
//        }

        $contact = Contact::create([
            'address' => $request->email,
            'message' =>  $request->message
        ]);
        return $this->mail->to('support@mg.hoboflyfishing.com')->send(new SalesInquiryContact($contact));
    }
}

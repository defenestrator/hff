<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsletterSubscription;
use Ramsey\Uuid\Uuid;
use App\Mail\NewsletterSubscriptionConfirmation;
use Illuminate\Contracts\Mail\Mailer;
class NewsletterSubscriptionsController extends Controller
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
            'email' => 'required|email'
        ]);

        if( NewsletterSubscription::where('email_address', '=', $request->email)->count() > 0 ) {

            $resend = NewsletterSubscription::where('email_address', '=', $request->email)->first();

            if($resend->token == '' || null){
                $resend->update(['token' => Uuid::uuid4()]);
            }

            $this->mail->to($request->email)->queue(new NewsletterSubscriptionConfirmation($resend));
            return response([
                    'message' => 'Subscription already exists for ' . $request->email . '. Please confirm your email address',
                    'success' => true
                ]
            );
        };
        $sub = NewsletterSubscription::create([
            'email_address'=> $request->email,
            'token' => Uuid::uuid4()
        ]);

        $this->mail->to($request->email)->send(new NewsletterSubscriptionConfirmation($sub));
        return response([
            'message' => 'Created subscription for '. $request->email . '. Please confirm your email address',
            'success' => true
        ]);
    }

    /**
     * @param NewsletterSubscription $subscription
     * @param $token
     * @return \Illuminate\Contracts\Routing\ResponseFactory|string|\Symfony\Component\HttpFoundation\Response
     */
    public function confirm(NewsletterSubscription $subscription, $token)
    {
        $message = 'Sorry, we do not recognize that link, let\'s go fishing!';
        $account = $subscription->where('token', '=', $token)->first();
        if( $account instanceof $subscription) {
            $account->update(['confirmed' => true, 'token' => null]);
            $message = 'Confirmed your subscription for '. $account->email_address .'. Thanks!';
            return view('thanks', compact('message'));
        };
        return view('thanks', compact('message'));
    }
}

<?php


namespace App\Http\Controllers\Api;

use App\Newsletter;
use Illuminate\Http\Request;
use App\Mail\NewsletterEmail;
use App\NewsletterSubscription;
use Illuminate\Contracts\Mail\Mailer;
class NewslettersApiController extends ApiController

{
    public $mail;

    public function __construct(Mailer $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Newsletter::orderBy('created_at', 'desc')->paginate(50, ['subject', 'id', 'sent_on']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'body' => 'required|min:8',
            'subject' => 'required|min:2'
        ]);
        return $newsletter->create([
            'body' => $request->body,
            'subject' => $request->subject
        ]);
    }

    /**
     * @param Newsletter $newsletter
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function edit(Newsletter $newsletter, $id)
    {
        return $newsletter->where('id', '=', $id)->first();
    }

    /**
     * @param Request $request
     * @param Newsletter $newsletter
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Newsletter $newsletter, $id)
    {
        $request->validate([
            'body' => 'required|min:8',
            'subject' => 'required|min:2'
        ]);

        $content = $newsletter->find($id);

        $content->update([
            'body'  => $request->body,
            'subject' => $request->subject
        ]);
        $content->save();
        return $content;
    }

    /**
     * @param NewsletterSubscription $subscription
     * @param Newsletter $newsletter
     * @param $id
     * @return mixed
     */
    public function send(NewsletterSubscription $subscription, Newsletter $newsletter, $id)
    {
        $news = $newsletter->find($id);
        $news->update([
            'sent_on'=> date('Y-m-d')
        ]);
        $news->save();
        $subscribers = $subscription->whereConfirmed(true)->pluck('email_address');
        return $this->mail->to('mailing-list@hoboflyfishing.com')->bcc($subscribers)->send(new NewsletterEmail($news));
    }

    /**
     * @param Newsletter $newsletter
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy(Newsletter $newsletter, $id)
    {
        $newsletter->destroy($id);
        return response()->json(['data' => 'ok']);
    }
}
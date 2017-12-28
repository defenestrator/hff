<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterPreviewController extends Controller
{
    /**
     * @var Newsletter
     */
    public $newsletter;

    /**
     * NewsletterPreviewController constructor.
     * @param Newsletter $newsletter
     */
    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('mail.newsletter', ['newsletter' => $this->newsletter->whereId($id),'date' => date('F, Y')]);
    }
}

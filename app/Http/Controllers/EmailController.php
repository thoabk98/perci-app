<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Mail\SendMailable;
use Mail;


class EmailController extends Controller
{
    public function store(Request $request)
    {
        $email = $request->email;
        $title = $request->title;
        $question = $request->question;
        $arrDemo = ['email' => $email, 'title' => $title, 'question' => $question];
        Mail::to("dohuybach714@gmail.com")->send(new SendMailable($arrDemo));

    }
}

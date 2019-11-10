<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeatureStoreRequest;
use Illuminate\Support\Facades\Session;
use App\Mail\SendMailableFeature;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Mail;

class FeatureController extends AdminController
{
    public function store(FeatureStoreRequest $request)
    {
        $validated = $request->validated();
        $user_email = Auth::User()->email;
        try {
            Mail::to("dohuybach714@gmail.com")->send(new SendMailableFeature($validated, $user_email));
            return $this->response(true, 'Mail sent successfully');
        } catch (\Exception $ex) {
            Log::error('Send mail: fail. message: '.$ex->getMessage().'. file: '.$ex->getFile().'. line: '.$ex->getLine());
            return $this->response(false, 'Mail failed to send');
        }
    }
}

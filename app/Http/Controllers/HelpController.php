<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelpStoreRequest;
use Illuminate\Support\Facades\Session;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Log;
use Mail;


class HelpController extends AdminController
{
    public function store(HelpStoreRequest $request)
    {
        $validated = $request->validated();
        try {
            Mail::to("dohuybach714@gmail.com")->send(new SendMailable($validated));
            return $this->response(true, 'Mail sent successfully');
        } catch (\Exception $ex) {
            Log::error('Send mail: fail. message: '.$ex->getMessage().'. file: '.$ex->getFile().'. line: '.$ex->getLine());
            return $this->response(false, 'Mail failed to send');
        }
    }
}

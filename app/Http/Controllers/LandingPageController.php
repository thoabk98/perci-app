<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landingpage.index');
    }

    public function termOfService()
    {
        return view('landingpage.term-of-service');
    }

    public function privacyPolicy()
    {
        return view('landingpage.privacy-policy');
    }

    public function faq()
    {
        return view('landingpage.faq');
    }
}

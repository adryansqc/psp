<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('fe.page.home');
    }
    public function about()
    {
        return view('fe.page.about');
    }
    public function project()
    {
        return view('fe.page.project-details');
    }
    public function contact()
    {
        return view('fe.page.contactus');
    }
}

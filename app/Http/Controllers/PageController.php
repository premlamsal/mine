<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('Pages/Home');
    }
    public function makePage(Request $request)
    {
        //this will fetch page content that is requested from database and make page

    }
}

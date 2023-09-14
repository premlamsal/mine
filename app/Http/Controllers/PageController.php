<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('Pages/Home');
    }

    public function plans()
    {

        $plans = Plan::with('miner')->get();

        return view('Pages/Plans')->with('plans', $plans);
    }

    public function makePage(Request $request)
    {
        //this will fetch page content that is requested from database and make page

    }
}

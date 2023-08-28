<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        if (Auth::check()) {
            return view('Pages/User/Dashboard');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function purchase()
    {
        return view('Pages/User/Purchase');
    }
    public function withdraw()
    {
        return view('Pages/User/Withdraw');
    }
    public function referral()
    {
        return view('Pages/User/Referral');
    }
    public function settings()
    {
        return view('Pages/User/Settings');
    }
    public function logoutother()
    {
        Auth::logoutOtherDevices('premlamsal');
    }
}

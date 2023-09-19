<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\User;
use App\Models\WithDraw;
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
        $purchases = Purchase::where('user_id', Auth::user()->id)->get();
        $purchase_power = $purchases->sum('mining_power');
        $purchase_power_unit = 'TH/s';
        $purchase_total_cost = $purchases->sum('price');
        $purchase_total_number = $purchases->count();


        return view('Pages/User/Purchase')->with([
            'purchases' => $purchases,
            'purchase_power' => $purchase_power,
            'purchase_power_unit' => $purchase_power_unit,
            'purchase_total_cost' => $purchase_total_cost,
            'purchase_total_cost_unit' => 'USD',
            'purchase_total_number' => $purchase_total_number
        ]);
    }
    public function withdraw()
    {

        $withdraws = WithDraw::where('user_id', Auth::user()->id)->get();

        return view('Pages/User/Withdraw')->with([
            'withdraws' => $withdraws,

        ]);;
    }
    public function referral()
    {
        // date, referred user,active mining power, level/bonus share, commission

        $users = User::where('ref_id', Auth::user()->id)->get();

        $total_referral = User::where('ref_id', Auth::user()->id)->get()->count();


        return view('Pages/User/Referral')->with(['referrals' => $users, 'total_referral' => $total_referral]);
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

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Referral;
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
            $purchases = Purchase::where('user_id', Auth::user()->id)->get();

            $purchase_power = $purchases->sum('mining_power');

            $purchase_power_unit = 'TH/s';

            $referrals = Referral::where('referring_user_id', Auth::user()->id)->with('referredUser')->get();

            $total_referral = $referrals->count();

            $total_referral_power = $referrals->sum('referral_commision_power');

            $total_referral_power_unit = 'TH/s';

            return view('Pages/User/Dashboard')->with([
                'purchase_power' => $purchase_power,
                'purchase_power_unit' => $purchase_power_unit,
                'total_referral' => $total_referral,
                'total_referral_power' => $total_referral_power,
                'total_referral_power_unit' => $total_referral_power_unit,

            ]);
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
            'purchase_total_cost' => number_format($purchase_total_cost, 2, '.', ''),
            'purchase_total_cost_unit' => 'USD',
            'purchase_total_number' => $purchase_total_number
        ]);
    }
    public function withdraw()
    {

        $withdraws = WithDraw::where('user_id', Auth::user()->id)->get();

        $withdraws_total_amount = $withdraws->sum('amount');
        $withdraws_total = $withdraws->count();


        return view('Pages/User/Withdraw')->with([
            'withdraws' => $withdraws,
            'withdraws_total' => $withdraws_total,
            'withdraws_total_amount' => $withdraws_total_amount,

        ]);;
    }
    public function referral()
    {
        // date, referred user,active mining power, level/bonus share, commission

        $referrals = Referral::where('referring_user_id', Auth::user()->id)->with('referredUser')->get();

        $total_referral = $referrals->count();

        $total_referral_power = $referrals->sum('referral_commision_power');

        return view('Pages/User/Referral')->with(['referrals' => $referrals, 'total_referral' => $total_referral, 'total_referral_power' => $total_referral_power]);
    }
    public function settings()
    {
        return view('Pages/User/Settings');
    }
    public function updateSettings(Request $request)
    {
        $active_currency_get = $request->input('active_currency');

        $user = User::where('id', Auth::user()->id)->first();
        $user->active_currency = $active_currency_get;
        if ($user->save()) {
            //update success
            return back()->with('message', 'Congrats you have successfully updated');
        } else {
            //update not success
            return back()->with('error', 'Error while updaing.');
        }
    }
    public function logoutother()
    {
        Auth::logoutOtherDevices('premlamsal');
    }
}

<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function Login()
    {
        if (Auth::check()) {
            return redirect('user/dashboard');
        }
        return view('Pages/Login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function registration(Request $request)
    {
        if (Auth::check()) {
            return redirect('user/dashboard');
        }

        if ($request->has('ref')) {
            $user_data = User::where('unique_user_id', $request->input('ref'))->first();
            if ($user_data) {
                return view('Pages/Register')->with(['user_unique_id' => $user_data->unique_user_id, 'user_name' => $user_data->name]);
            }
        }
        return view('Pages/Register');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route('user.dashboard')->withSuccess('You have signed-in');
    }
    public function create(array $data)
    {

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->unique_user_id = $this->randomString();
        $user->status = 'active';
        $user->active_mining_power = 900;
        $user->active_mining_power_unit = 'TH/s';

        if (isset($data['bitcoin_address'])) {
            $user->bitcoin_address = $data['bitcoin_address'];
        }
        $user->password = Hash::make($data['password']);

        if (isset($data['ref_id'])) {

            if ($user->save()) {
                $user_id = User::where('unique_user_id', $data['ref_id'])->value('id');
                $user->ref_id = $user_id;
                $referral = new Referral();
                $referral->referred_user_id = $user->id;
                $referral->referring_user_id = $user->ref_id;
                return $referral->save();
            }
        }

        return $user->save();
    }

    public function signOut()
    {
        // session()->flush();
        Auth::guard()->logout();

        return Redirect('login');
    }
    public function randomString($length = 10)
    {
        // Set the chars
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Count the total chars
        $totalChars = strlen($chars);

        // Get the total repeat
        $totalRepeat = ceil($length / $totalChars);

        // Repeat the string
        $repeatString = str_repeat($chars, $totalRepeat);

        // Shuffle the string result
        $shuffleString = str_shuffle($repeatString);

        // get the result random string
        return substr($shuffleString, 1, $length);
    }
}

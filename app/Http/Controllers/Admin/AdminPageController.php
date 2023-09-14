<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Miner;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function dashboard()
    {
        return view('Pages/Admin/Home');
    }
    public function miners()
    {
        $miners = Miner::all();
        // dd($miners);
        return view('Pages/Admin/Miner/AllMiners')->with('miners', $miners);
    }

    public function addMiner()
    {
        return view('Pages/Admin/Miner/AddNewMiner');
    }
    public function createMiner(Request $request)
    {

        $this->validate($request, [
            'miner_name'   => 'required',
            'coin_code' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'min_withdraw_limit' => 'required',
            'max_withdraw_limit' => 'required',
        ]);

        $miner = new Miner();
        $miner->miner_name = $request->input('miner_name');
        $miner->coin_code = $request->input('coin_code');
        $miner->min_withdraw_limit = $request->input('min_withdraw_limit');
        $miner->max_withdraw_limit = $request->input('max_withdraw_limit');

        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/imger', $fileName);

        $miner->image = $fileName;


        if ($miner->save()) {

            return redirect('/admin/miners')->with([
                'message' => 'Miner added successfully!',
                'status' => 'success'
            ]);
        } else {
            return redirect('/admin/miners')->with([
                'message' => 'Miner creation failed!',
                'status' => 'error'
            ]);
        }
    }

    public function editMiner($id)
    {
        $miner = Miner::where('id', $id)->first();
        return view('Pages/Admin/Miner/EditMiner')->with('miner', $miner);
    }
    public function updateMiner(Request $request)
    {

        $this->validate($request, [
            'miner_name'   => 'required',
            'coin_code' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'min_withdraw_limit' => 'required',
            'max_withdraw_limit' => 'required',
            'miner_id' => 'required',
        ]);

        $miner =  Miner::where('id', $request->miner_id)->first();
        $miner->miner_name = $request->input('miner_name');
        $miner->coin_code = $request->input('coin_code');
        $miner->min_withdraw_limit = $request->input('min_withdraw_limit');
        $miner->max_withdraw_limit = $request->input('max_withdraw_limit');

        if ($request->has('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/imger', $fileName);
            $miner->image = $fileName;
        }

        if ($miner->save()) {

            return redirect('/admin/miners')->with([
                'message' => 'Miner updated successfully!',
                'status' => 'success'
            ]);
        } else {
            return redirect('/admin/miners')->with([
                'message' => 'Miner update failed!',
                'status' => 'error'
            ]);
        }
    }
    public function plans()
    {

        $plans = Plan::with('miner')->get();
        // dd($plans->get());
        // dd($plans);
        return view('Pages/Admin/Plan/AllPlans')->with('plans', $plans);
    }


    public function addPlan()

    {

        $miners = Miner::all();

        return view('Pages/Admin/Plan/AddNewPlan')->with('miners', $miners);
    }
    public function createPlan(Request $request)
    {

        $this->validate($request, [
            'miner_id'   => 'required',
            'title' => 'required',
            'price' => 'required',
            'return_amount_type' => 'required',
            'return_amount_per_day' => 'required',
            'speed' => 'required',
            'speed_unit' => 'required',

            'period' => 'required',
            'period_time' => 'required',

            'maintenance_cost' => 'required',
            'features' => 'required',
            'description' => 'required',
        ]);

        $plan = new Plan();
        $plan->miner_id = $request->input('miner_id');
        $plan->title = $request->input('title');
        $plan->price = $request->input('price');
        $plan->return_amount_type = $request->input('return_amount_type');
        $plan->return_amount_per_day = $request->input('return_amount_per_day');
        $plan->speed = $request->input('speed');
        $plan->period = $request->input('period');

        $plan->maintenance_cost = $request->input('maintenance_cost');
        $plan->features = $request->input('features');
        $plan->description = $request->input('description');

        $plan->period_time = $request->input('period_time');
        $plan->speed_unit = $request->input('speed_unit');
        $plan->status = 1; //status 1 for active
        if ($plan->save()) {

            return redirect('/admin/plans')->with([
                'message' => 'Plan added successfully!',
                'status' => 'success'
            ]);
        } else {
            return redirect('/admin/plans')->with([
                'message' => 'Plan creation failed!',
                'status' => 'error'
            ]);
        }
    }

    public function editPlan($id)
    {
        $plan = Plan::where('id', $id)->with('miner')->first();
        $miners = Miner::all();

        return view('Pages/Admin/Plan/EditPlan')->with(['plan' => $plan, 'miners' => $miners]);
    }
    public function updatePlan(Request $request)
    {

        $this->validate($request, [
            'miner_id'   => 'required',
            'title' => 'required',
            'price' => 'required',
            'return_amount_type' => 'required',
            'return_amount_per_day' => 'required',
            'speed' => 'required',
            'speed_unit' => 'required',

            'period' => 'required',
            'period_time' => 'required',

            'maintenance_cost' => 'required',
            'features' => 'required',
            'description' => 'required',
            'status' => 'required',

        ]);

        $plan =  Plan::where('id', $request->input('plan_id'))->first();
        $plan->miner_id = $request->input('miner_id');
        $plan->title = $request->input('title');
        $plan->price = $request->input('price');
        $plan->return_amount_type = $request->input('return_amount_type');
        $plan->return_amount_per_day = $request->input('return_amount_per_day');
        $plan->speed = $request->input('speed');
        $plan->period = $request->input('period');

        $plan->maintenance_cost = $request->input('maintenance_cost');
        $plan->features = $request->input('features');
        $plan->description = $request->input('description');

        $plan->period_time = $request->input('period_time');
        $plan->speed_unit = $request->input('speed_unit');
        $plan->status = $request->input('status'); //status 1 for active
        if ($plan->save()) {

            return redirect('/admin/plans')->with([
                'message' => 'Plan updated successfully!',
                'status' => 'success'
            ]);
        } else {
            return redirect('/admin/plans')->with([
                'message' => 'Plan updation failed!',
                'status' => 'danger'
            ]);
        }
    }

    public function users()
    {
        $users = User::all();
        // dd($plans->get());
        // dd($plans);
        return view('Pages/Admin/User/AllUsers')->with('users', $users);
    }

    public function adminLogout()
    {
        if (Auth::guard('admin')->logout());

        return redirect('admin/login');
    }
}

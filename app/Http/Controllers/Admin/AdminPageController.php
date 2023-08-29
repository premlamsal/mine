<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Miner;
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
    public function adminLogout()
    {
        if (Auth::guard('admin')->logout());

        return redirect('admin/login');
    }
}

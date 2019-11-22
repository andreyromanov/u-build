<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $buildings = DB::table('buildings')->where('users_id',$user->id)->get();

        $buildingsCount = $buildings->count();

        $buildings_done = DB::table('buildings')->where('buildings.end_date', '<', date('Y-m-d'))->where('users_id',$user->id)->get();

        $buildingsCount_done = $buildings_done->count();

        $contracts = DB::table('contracts')->join('buildings','buildings.building_id','=','contracts.buildings_building_id')->join('users','users.id','=','buildings.users_id')->where('users_id',$user->id)->get();

        $contractsCount = $contracts->count();

        $contracts_done = DB::table('contracts')->where('contracts.end_date', '<', date('Y-m-d'))->join('buildings','buildings.building_id','=','contracts.buildings_building_id')->join('users','users.id','=','buildings.users_id')->where('users_id',$user->id)->get();

        $contractsCount_done = $contracts_done->count();

        $plans = DB::table('plans')->where('status', 0)->join('buildings','buildings.building_id','=','plans.buildings_building_id')->join('users','users.id','=','buildings.users_id')->where('users_id',$user->id)->get();

        $plansCount = $plans->count();

        $plans_done = DB::table('plans')->where('status', 1)->join('buildings','buildings.building_id','=','plans.buildings_building_id')->join('users','users.id','=','buildings.users_id')->where('users_id',$user->id)->get();

        $plansCount_done = $plans_done->count();
        //dd($plans);

        return view('home',[
            'buildingsCount' => $buildingsCount,
            'contractsCount' => $contractsCount,
            'plansCount' => $plansCount,
            'plansCount_done' => $plansCount_done,
            'contractsCount_done' => $contractsCount_done,
            'buildingsCount_done' => $buildingsCount_done
            ]);
    }

    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        User::where('id', '=', $request->user_id)->update(['name' => $request->name, 'email' => $request->email]);

        return redirect()->back();
    }

    public function showUserInfo(Request $request)
    {
        $user = User::where('id', '=', $request->id)->firstOrFail();

        return $user;
    }
}

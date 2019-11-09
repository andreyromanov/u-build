<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $contracts = DB::table('contracts')->join('buildings','buildings.building_id','=','contracts.buildings_building_id')->join('users','users.id','=','buildings.users_id')->where('users_id',$user->id)->get();

        $contractsCount = $contracts->count();

        $plans = DB::table('plans')->where('status', 0)->join('buildings','buildings.building_id','=','plans.buildings_building_id')->join('users','users.id','=','buildings.users_id')->where('users_id',$user->id)->get();

        $plansCount = $plans->count();
        //dd($plans);

        return view('home',[
            'buildingsCount' => $buildingsCount,
            'contractsCount' => $contractsCount,
            'plansCount' => $plansCount
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

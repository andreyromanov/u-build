<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        return view('home');
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

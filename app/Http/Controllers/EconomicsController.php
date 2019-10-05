<?php

namespace App\Http\Controllers;

use App\Economics;
use Illuminate\Http\Request;
use App\Charts\RegisteredUsers;

class EconomicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart = new RegisteredUsers;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'bar', [1, 2, 3, 4]);

        $economics = Economics::all();
        
        return view('economics.economics', ['economics' => $economics, 'chart' => $chart]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Economics  $economics
     * @return \Illuminate\Http\Response
     */
    public function show(Economics $economics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Economics  $economics
     * @return \Illuminate\Http\Response
     */
    public function edit(Economics $economics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Economics  $economics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Economics $economics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Economics  $economics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Economics $economics)
    {
        //
    }
}

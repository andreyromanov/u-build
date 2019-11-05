<?php

namespace App\Http\Controllers;

use App\Plans;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Plans  $plans
     * @return \Illuminate\Http\Response
     */
    public function show(Plans $plans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plans  $plans
     * @return \Illuminate\Http\Response
     */
    public function edit(Plans $plans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plans  $plans
     * @return \Illuminate\Http\Response
     */
    public function taskDone(Request $request, Plans $plans)
    {
        Plans::where('plan_id', $request->id)->update(['status' => 1]);
        
        return 'deleted';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plans  $plans
     * @return \Illuminate\Http\Response
     */
    public function taskDelete(Request $request)
    {
        Plans::destroy($request->id);

        return 'deleted';
    }
}

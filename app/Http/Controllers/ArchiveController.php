<?php

namespace App\Http\Controllers;

use App\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ArchiveController extends Controller
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
        $b_id = $request->building_id;
        $salary = DB::table('contracts')->where('buildings_building_id', $b_id)->join('workers','workers.worker_id','=','contracts.workers_worker_id')->get();
        $salaryCount = $salary->count();

        $purchases = DB::table('purchases')->where('buildings_building_id', $b_id)->join('products','products.product_id','=','purchases.products_product_id')->get();
        $purchasesCount = $purchases->count();

        $salary_al = 0;
        foreach($salary as $sal){
            $salary_al += $sal->salary;
        }
        $av_sal_cur = round($salary_al/$salaryCount,2);

        $income = DB::table('plans')->join('work_types','work_types.type_id','=','plans.work_types_type_id')->where('status', '=', 1)->join('buildings','buildings.building_id','=','plans.buildings_building_id')->get(); 

        
        dd($av_sal_cur);

        return 'gg';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show(Archive $archive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive $archive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive $archive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive $archive)
    {
        //
    }
}

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

    function incomeTax($a){

        $pure = $a-($a*0.18);
        
        return $pure;
    }

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
        //salary
        $salary = DB::table('contracts')->where('buildings_building_id', $b_id)->join('workers','workers.worker_id','=','contracts.workers_worker_id')->get();
        $salaryCount = $salary->count();
        //purchases
        $purchases = DB::table('purchases')->where('buildings_building_id', $b_id)->join('products','products.product_id','=','purchases.products_product_id')->get();
        $purchasesCount = $purchases->count();
        //salary
        $salary_al = 0;
        foreach($salary as $sal){
            $salary_al += $sal->salary;
        }
        $av_sal_cur = round($salary_al/$salaryCount,2);
        //income
        $income = DB::table('plans')->where('status', '=', 1)->where('buildings_building_id', $b_id)->join('buildings','buildings.building_id','=','plans.buildings_building_id')->get(); 
        $income_total = 0;
        foreach($income as $in){
            $income_total += $in->work_price;
        }
        //income pure
        $income_pure = self::incomeTax($income_total);

        //spent
        
        //dd($income);

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

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Buildings;
use Illuminate\Http\Request;
use App\Charts\RegisteredUsers;

class BuildingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buildings = Buildings::where('users_id', '=', $request->id)->get();

        
        
        return view('buildings.buildings',['buildings' => $buildings]);
   
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
        Buildings::create([
            'name' => $request['name'],
            'budjet' => $request['budjet'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'users_id' => $request['user_id'],
        ]);    
    
        $buildings = Buildings::where('users_id', '=', $request->user_id)->get();

        return view('buildings.buildings',['buildings' => $buildings]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buildings  $buildings
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Buildings $buildings)
    {

        //add where to sql for specific building

        $building = Buildings::where('building_id', '=', $request->id)->get();

        $products = DB::table('products')->join('sellers','sellers.seller_id','=','products.sellers_seller_id')->get();

        $purchases = DB::table('purchases')->where('buildings_building_id', '=', $request->id)->join('products','products.product_id','=','purchases.products_product_id')->get();

        $workers = DB::table('workers')->get();

        $contracts = DB::table('contracts')->where('buildings_building_id', '=', $request->id)->join('workers','workers.worker_id','=','contracts.workers_worker_id')->get();
//dd($purchases);
        $spent = 0;

        foreach($purchases as $purch){
            $spent += $purch->price * $purch->count;
        }

        $budget_rest = $building[0]->budjet - $spent;

        $chart1 = new RegisteredUsers;
        $chart1->labels(['Витрачено', 'Залишилось']);
        $chart1->dataset('My dataset', 'pie', [$spent, $budget_rest])->backgroundColor([ '#ff0000', '#00ff00']);;

        return view('buildings.one',[
            'building' => $building,
            'products' => $products, 
            'purchases' => $purchases, 
            'workers' => $workers, 
            'contracts' => $contracts,
            'chart1' => $chart1,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buildings  $buildings
     * @return \Illuminate\Http\Response
     */
    public function edit(Buildings $buildings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buildings  $buildings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buildings $buildings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buildings  $buildings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buildings $buildings)
    {
        //
    }

    public function addMaterial(Request $request)
    {
        DB::table('purchases')->insert([

            [
                'products_product_id' => $request->product_id,
                'count' => $request->count,
                'buildings_building_id' => $request->building_id
            ],
           

        ]);

        return 'added';
    }

    public function signContract(Request $request)
    {
        DB::table('contracts')->insert([

            [
                'start_date' => $request->start,
                'end_date' => $request->end,
                'buildings_building_id' => $request->building_id,
                'workers_worker_id' => $request->worker_id
            ],
           

        ]);

        return 'signed';
    }
}

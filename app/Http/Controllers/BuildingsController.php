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

       // $workers = DB::table('workers')->get();

       $workers =  DB::table('workers')->select('*')->whereNotIn('workers.worker_id',function($query) {

            $query->select('contracts.workers_worker_id')->from('contracts');
         
         })->get();

        $contracts = DB::table('contracts')->where('buildings_building_id', '=', $request->id)->join('workers','workers.worker_id','=','contracts.workers_worker_id')->get();
//dd($purchases);
        $spent = 0;

        foreach($purchases as $purch){
            $spent += $purch->price * $purch->count;
        }

        $budget_rest = $building[0]->budjet - $spent;

        $chart1 = new RegisteredUsers;
        $chart1->labels(['Витрачено', 'Залишилось']);
        $chart1->dataset('My dataset', 'pie', [$spent, $budget_rest])->backgroundColor([ '#ff0000', '#00ff00']);


        $labels = [];
        $data = [];
        $data2 = [];
        $colors =[];
        foreach($purchases as $purch){
            //$rand_color = '#' . substr(md5(mt_rand()), 0, 6);

            array_push($labels, $purch->name);

            array_push($data, $purch->price * $purch->count);
            array_push($data2, $purch->price * $purch->count * 2);
            
            //array_push($colors, $rand_color);
        }

        $chart2 = new RegisteredUsers;
        $chart2->labels($labels);
        $chart2->dataset('2018 рік', 'line', $data)->color('yellow');
        $chart2->dataset('2019 рік', 'line', $data2)->color('blue');

        //sellers bar
        $sellers = DB::table('sellers')->distinct()->get();
        
        $sums=[];
        $sel_names=[];
        $sel_colors =[];
        foreach($sellers as $sell){
            $sum=0;
            $purchases2 = DB::table('purchases')->join('products','products.product_id','=','products_product_id')->where('sellers_seller_id', '=', $sell->seller_id)->join('sellers','products.sellers_seller_id','=','sellers.seller_id')->where('buildings_building_id', '=', $request->id)->get();
            //dd($purchases2);   
            foreach($purchases2 as $pur){
                    $sum= $sum+($pur->count * $pur->price);  
                    //dd($pur); 
                   // dd($sum, $sell);
                }
                //dd($sum);
                $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
                array_push($sel_colors, $rand_color);
                array_push($sel_names, $sell->seller); 
                array_push($sums, $sum); 
                
        }
        //dd($sums);
        
        $chart3 = new RegisteredUsers;
        $chart3->labels($sel_names);
        $chart3->dataset('Постачальники', 'bar', $sums)->backgroundColor($sel_colors);
        //dd($request->id);
        //dd($sums);
        return view('buildings.one',[
            'building' => $building,
            'products' => $products, 
            'purchases' => $purchases, 
            'workers' => $workers, 
            'contracts' => $contracts,
            'chart1' => $chart1,
            'chart2' => $chart2,
            'chart3' => $chart3,

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

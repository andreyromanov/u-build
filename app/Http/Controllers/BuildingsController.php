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
        //dd($contracts);
        $spent = 0;

        foreach($purchases as $purch){
            $spent += $purch->price * $purch->count;
        }

        foreach($contracts as $contr){
            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $contr->end_date);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $contr->start_date);
            $diff_in_days = $to->diffInDays($from);
            //dd($diff_in_days);
            $spent += $contr->salary * $diff_in_days;
        }

        $budget_rest = $building[0]->budjet - $spent;

        $chart1 = new RegisteredUsers;
        $chart1->labels(['Витрачено, грн', 'Залишилось, грн']);
        $chart1->dataset('My dataset', 'pie', [$spent, $budget_rest])->backgroundColor([ '#ff0000', '#00ff00']);
        $chart1->options([
            'scales' => [
                'yAxes' => [
                    [
                        'display'=>false
                    ]
                ]
            ]
        ]);
        

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
        $chart2->labels([
            "Січень",
            "Лютий", 
            "Березень", 
            "Квітень", 
            "Травень", 
            "Червень", 
            "Липень", 
            "Серпень", 
            "Вересень", 
            "Жовтень", 
            "Листопад", 
            "Грудень"
            ]);

            //date purchases
            $purchases_dec = DB::table('purchases')->where('buildings_building_id', '=', $request->id)->join('products','products.product_id','=','purchases.products_product_id')->whereYear('purch_date', '=', 2019)->whereMonth('purch_date', '=', 12)->get();
            $purc_dec = 0;
            foreach($purchases_dec as $p_dec){
                //$rand_color = '#' . substr(md5(mt_rand()), 0, 6);
    
                $purc_dec += $p_dec->price * $p_dec->count;
                
            }
        $current_year = [1000, 2110, 3430, 3450, 4530, 3570, 4230, 3230, 2440, 2340, 3430, $purc_dec];
        //$prev_year = [100, 211, 345, 334, 453, 756, 423, 323, 544, 233, 234, 0];

        
        //$chart2->dataset('2018 рік', 'line', $prev_year)->color('yellow');
        $chart2->dataset('2019 рік', 'line', $current_year)->color('blue');
        $chart2->options([
            'scales' => [
                'yAxes' => [
                    [
                        'scaleLabel' =>
                        [
                            'display' => true,
                            'labelString' => 'Витрати, грн.',
                        ],
                    ]
                ]
            ]
        ]);
        

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
                array_push($sel_names, $sell->seller.', грн'); 
                array_push($sums, $sum); 
                
        }
        //dd($sums);
        
        $chart3 = new RegisteredUsers;
        $chart3->labels($sel_names);
        $chart3->dataset('Постачальники', 'pie', $sums)->backgroundColor(['lightblue', 'lightgreen', 'tomato']);
        //dd($request->id);
        //dd($sums);
        $chart3->options([
            'scales' => [
                'yAxes' => [
                    [
                        'display'=>false,
                        
                    ]
                ]
            ],
        ]);

        //TASKS TASKS TASKS
        $work_types = DB::table('work_types')->get();

        $tasks = DB::table('plans')->where('buildings_building_id', '=', $request->id)->join('work_types','work_types.type_id','=','work_types_type_id')->get();


        return view('buildings.one',[
            'building' => $building,
            'products' => $products, 
            'purchases' => $purchases, 
            'workers' => $workers, 
            'contracts' => $contracts,
            'work_types' => $work_types,
            'tasks' => $tasks,
            'chart1' => $chart1,
            'chart2' => $chart2,
            'chart3' => $chart3,

            'spent' => $spent,
            'budget_rest' => $budget_rest

            ]);
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
    public function destroy(Request $request)
    {

        Buildings::where('building_id', $request->id)->delete();

        return 'deleted';
    }

    public function addMaterial(Request $request)
    {
        $date =  date('Y-m-d');

        DB::table('purchases')->insert([

            [
                'products_product_id' => $request->product_id,
                'count' => $request->count,
                'buildings_building_id' => $request->building_id,
                'purch_date' => $date
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

    public function addTask(Request $request)
    {
        DB::table('plans')->insert([

            [
                'work_types_type_id' => $request->work_type,
                'buildings_building_id' => $request->building_id,
                'text' => $request->text,
                'work_price' => $request->price,
                'status' => $request->status
            ],
           

        ]);

        return 'new task';
    }

    public function edit(Request $request)
    {

        Buildings::where('building_id', $request->building_id)->update([
            'name' => $request->name,
            'budjet' => $request->budjet,
            'start_date' => $request->start,
            'end_date' => $request->end
        ]);

        dd(Buildings::where('building_id', $request->building_id));

        return 'updated';
    }
}

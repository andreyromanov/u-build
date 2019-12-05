<?php

namespace App\Http\Controllers;

use App\Economics;
use Illuminate\Http\Request;
use App\Charts\RegisteredUsers;
use Illuminate\Support\Facades\DB;


class StatisticsController extends Controller
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
        $chart->dataset('My dataset', 'bar', [1, 2, 3, 4])->color('red')->fill('red');

        $chart2 = new RegisteredUsers;
        $chart2->labels(['One', 'Two', 'Three']);
        $chart2->dataset('My dataset', 'pie', [1, 2, 3])->backgroundColor(['#00ff00', '#ff0000', '#0000ff']);;

        $chart3 = new RegisteredUsers;
        $chart3->labels(['One', 'Two', 'Three', 'Four']);
        $chart3->dataset('My dataset', 'line', [1, 2, 3, 4])->options([
            'color' => 'rgba(1, 2, 0, 0.5)',
        ]);

        $economics = Economics::all();
        $economics2 = Economics::all('name','count');
        
        $labels = [];
        $data = [];
        $colors =[];
        foreach($economics2 as $economic){
            $rand_color = '#' . substr(md5(mt_rand()), 0, 6);

            array_push($labels, $economic->name);

            array_push($data, $economic->count);
            
            array_push($colors, $rand_color);
        }

        $chart4 = new RegisteredUsers;
        $chart4->labels($labels);
        $chart4->dataset('My dataset', 'pie', $data)->backgroundColor($colors);

        //select sum spent to each seller
       // $purchases = DB::table('purchases')->join('products','products.product_id','=','purchases.products_product_id')->join('sellers','sellers.seller_id','=','products.sellers_seller_id')->get();
    
        $sellers = DB::table('sellers')->distinct()->get();
        $sum=0;
        $sum2=0;
        $sums=[];
        $sel_names=[];
        $sel_colors =[];
        $all_sum=0;
        $test = (object)[];
        $pers = [];
        foreach($sellers as $sell){
            $purchases = DB::table('purchases')->join('products','products.product_id','=','purchases.products_product_id')->where('sellers_seller_id', '=', $sell->seller_id)->join('sellers','sellers_seller_id', '=', 'sellers.seller_id')->get();
            //dd($purchases);   
            foreach($purchases as $pur){
                    $sum+=$pur->count * $pur->price;
                    
                }
                //dd($sum);
                $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
                array_push($sel_colors, $rand_color);
                array_push($sel_names, $sell->seller); 
                array_push($sums, $sum); 
                $all_sum+=$sum;
        }
        //count persentage
        foreach($sellers as $sell){
            $purchases = DB::table('purchases')->join('products','products.product_id','=','purchases.products_product_id')->where('sellers_seller_id', '=', $sell->seller_id)->join('sellers','sellers_seller_id', '=', 'sellers.seller_id')->get(); 
            foreach($purchases as $pur){
                    $sum2+=$pur->count * $pur->price;
                }
                $per = round((($sum2/$all_sum)*100) ,2);
                $pers[] = ['seller' => $sell->seller, 'pers' => $per];
        }
        //dd($pers);

        $chart5 = new RegisteredUsers;
        $chart5->labels($sel_names);
        $chart5->dataset('My dataset', 'pie', $sums)->backgroundColor($sel_colors);

        //Прибуток

        $income = DB::table('plans')->join('work_types','work_types.type_id','=','plans.work_types_type_id')->where('status', '=', 1)->join('buildings','buildings.building_id','=','plans.buildings_building_id')->whereYear('end_date', '=', 2020)->get(); 
        $income_prev = DB::table('plans')->join('work_types','work_types.type_id','=','plans.work_types_type_id')->where('status', '=', 1)->join('buildings','buildings.building_id','=','plans.buildings_building_id')->whereYear('end_date', '=', 2018)->get(); 

        //dd($income);
        $income_total = 0;
        foreach($income as $in){
            $income_total += $in->work_price;
        }

        $income_total_prev = 0;
        foreach($income_prev as $in){
            $income_total_prev += $in->work_price;
        }
         //dd($income_total);

         //вироблення
        $plans_done = DB::table('plans')->where('status', 1)->join('buildings','buildings.building_id','=','plans.buildings_building_id')->get();
        //dd($plans_done);
        $plansCount_done_cur = ($plans_done->count())/365;

        //трудомісткість
        $work_cur = 365/($plans_done->count());

        //продуктивність
        $prod_cur = round($plans_done->count()/$work_cur, 2);
       
        $chart6 = new RegisteredUsers;
        $chart6->labels([]);
        $chart6->dataset('Минулий', 'bar', [1400-(1400*0.18)])->backgroundColor("tomato");
        $chart6->dataset('Поточний', 'bar', [$income_total-($income_total*0.18)])->backgroundColor("lightgreen");

        $chart7 = new RegisteredUsers;
        $chart7->labels([]);
        $chart7->dataset('Минулий', 'bar', [0.1])->backgroundColor("lightblue");
        $chart7->dataset('Поточний', 'bar', [$prod_cur])->backgroundColor("green");



        //витрати

        $contracts = DB::table('contracts')->join('workers','workers.worker_id','=','contracts.workers_worker_id')->get();
        //dd($contracts);
        $spent = 0;

        foreach($contracts as $contr){
            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $contr->end_date);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $contr->start_date);
            $diff_in_days = $to->diffInDays($from);
            //dd($diff_in_days);
            $spent += $contr->salary * $diff_in_days;
        }

        $chart8 = new RegisteredUsers;
        $chart8->labels(["Минулий", "Поточний"]);
        $chart8->dataset('Контракти', 'bar', [9000, $spent])->backgroundColor("blue");
        $chart8->dataset('Матеріали', 'bar', [4000, $sum2])->backgroundColor("green");
        
        
        return view('statistics.statistics', [
                                            'economics' => $economics,
                                            'income_total' =>  $income_total,
                                            'income_total_prev' =>  1000,
                                            'chart' => $chart, 
                                            'chart2' => $chart2, 
                                            'chart3' => $chart3, 
                                            'chart4' => $chart4, 
                                            'chart5' => $chart5, 
                                            'all_sum' => $all_sum, 
                                            'sums' => $sums, 
                                            'pers' => $pers,
                                            'plansCount_done_prev' => 0.01,
                                            'plansCount_done_cur' => $plansCount_done_cur,

                                            'prod_prev' => 0.1,
                                            'prod_cur' => $prod_cur,

                                            'work_prev' => 55,
                                            'work_cur' => $work_cur,

                                            'chart6' => $chart6,
                                            'chart7' => $chart7,

                                            'min_prev' => 13000,
                                            'min_cur' => $spent+$sum2,
                                            'chart8' => $chart8,
                                            ]);
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

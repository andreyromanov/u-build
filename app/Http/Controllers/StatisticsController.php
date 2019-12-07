<?php

namespace App\Http\Controllers;

use App\Economics;
use Illuminate\Http\Request;
use App\Charts\RegisteredUsers;
use Illuminate\Support\Facades\DB;


class StatisticsController extends Controller
{
   
    function diffPerc($a, $b){

        $diff = round((($a-$b)/$b*100) , 2);
        
        return $diff;
    }

    function incomeTax($a){

        $pure = $a-($a*0.18);
        
        return $pure;
    }

    public function index()
    {
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
        }
        
        $chart5 = new RegisteredUsers;
        $chart5->labels($sel_names);
        $chart5->dataset('My dataset', 'pie', $sums)->backgroundColor($sel_colors);

        //Прибуток

        $income = DB::table('plans')->join('work_types','work_types.type_id','=','plans.work_types_type_id')->where('status', '=', 1)->join('buildings','buildings.building_id','=','plans.buildings_building_id')->whereYear('end_date', '=', 2020)->get(); 
        $income_prev = DB::table('plans')->join('work_types','work_types.type_id','=','plans.work_types_type_id')->where('status', '=', 1)->join('buildings','buildings.building_id','=','plans.buildings_building_id')->whereYear('end_date', '=', 2018)->get(); 

        //dd($income);
        
        $income_total_prev = 1000;
        foreach($income_prev as $in){
            $income_total_prev += $in->work_price;
        }

        $income_total = 0;
        foreach($income as $in){
            $income_total += $in->work_price;
        }
        $income_diff = self::diffPerc($income_total, $income_total_prev);
         //dd($income_total);

        $income_pure_prev = self::incomeTax($income_total_prev);
        $income_pure_cur = self::incomeTax($income_total);
        $income_pure_diff = self::diffPerc($income_pure_cur, $income_pure_prev);

         //вироблення
        $plans_done = DB::table('plans')->where('status', 1)->join('buildings','buildings.building_id','=','plans.buildings_building_id')->get();
        //dd($plans_done);
        $plansCount_done_prev = 0.01;
        $plansCount_done_cur = round($plans_done->count()/365, 2);
        $plansCount_done_diff = self::diffPerc($plansCount_done_cur, $plansCount_done_prev);

        //трудомісткість
        $work_prev = 55;
        $work_cur = round(365/$plans_done->count(), 2);
        $work_diff = self::diffPerc($work_cur, $work_prev);

        //продуктивність
        $prod_prev = 0.1;
        $prod_cur = round($plans_done->count()/$work_cur, 2);
        $prod_diff = self::diffPerc($prod_cur, $prod_prev);
       
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
        $spent_cur = 0;

        foreach($contracts as $contr){
            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $contr->end_date);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $contr->start_date);
            $diff_in_days = $to->diffInDays($from);
            //dd($diff_in_days);
            $spent_cur += $contr->salary * $diff_in_days;
        }

        $spent_prev = 13000;
        $spent_cur += $sum2;
        $spent_diff = self::diffPerc($spent_cur, $spent_prev); 

        $chart8 = new RegisteredUsers;
        $chart8->labels(["Минулий", "Поточний"]);
        $chart8->dataset('Контракти', 'bar', [9000, $spent_prev])->backgroundColor("blue");
        $chart8->dataset('Матеріали', 'bar', [4000, $spent_cur])->backgroundColor("green");
        
        
        return view('statistics.statistics', [
                                           
                                            'income_total' =>  $income_total,
                                            'income_total_prev' =>  $income_total_prev,
                                            'income_diff' => $income_diff,

                                            'income_pure_prev' => $income_pure_prev,
                                            'income_pure_cur' => $income_pure_cur,
                                            'income_pure_diff' => $income_pure_diff,
                                            
                                            'all_sum' => $all_sum, 
                                            'sums' => $sums, 
                                            'pers' => $pers,
                                            'plansCount_done_prev' => $plansCount_done_prev,
                                            'plansCount_done_cur' => $plansCount_done_cur,
                                            'plansCount_done_diff' => $plansCount_done_diff,

                                            'prod_prev' => $prod_prev,
                                            'prod_cur' => $prod_cur,
                                            'prod_diff' => $prod_diff,

                                            'work_prev' => $work_prev,
                                            'work_cur' => $work_cur,
                                            'work_diff' => $work_diff,

                                            'chart6' => $chart6,
                                            'chart7' => $chart7,

                                            'spent_prev' => $spent_prev,
                                            'spent_cur' => $spent_cur,
                                            'spent_diff' => $spent_diff,
                                            'chart8' => $chart8,
                                            ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Economics $economics)
    {
        //
    }

    public function edit(Economics $economics)
    {
        //
    }

    public function update(Request $request, Economics $economics)
    {
        //
    }

    public function destroy(Economics $economics)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Economics;
use Illuminate\Http\Request;
use App\Charts\RegisteredUsers;
use Illuminate\Support\Facades\DB;


class EconomicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function diffPerc($a, $b){

        $diff = round((($a-$b)/$b*100) , 2);
        
        return $diff;
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
                $per = round((($sum2/$all_sum)*100) ,2);
                $pers[] = ['seller' => $sell->seller, 'pers' => $per];
        }
        //dd($pers);

        $chart5 = new RegisteredUsers;
        $chart5->labels($sel_names);
        $chart5->dataset('My dataset', 'pie', $sums)->backgroundColor($sel_colors);

        //Прибуток

        $income = DB::table('plans')->join('work_types','work_types.type_id','=','plans.work_types_type_id')->where('status', '=', 1)->get(); 
        //dd($income);
        $income_total = 0;
        foreach($income as $in){
            $income_total += $in->work_price;
        }
         //dd($income_total);

        $contracts = DB::table('contracts')->get();
        $contractsCount = $contracts->count();
        
        $builds = DB::table('buildings')->get();
        $buildsCount = $builds->count();
        //dd($contractsCount);
        $av_workers_cur = round($contractsCount/$buildsCount,2);
        $av_workers_prev = 0.65;
        $workers_diff = self::diffPerc($av_workers_cur, $av_workers_prev);
        
        $chart = new RegisteredUsers;
        $chart->labels([]);
        $chart->dataset('Минулий', 'bar', [$av_workers_prev])->backgroundColor("lightblue");
        $chart->dataset('Поточний', 'bar', [$av_workers_cur])->backgroundColor("green");

        //зарплата
        $salary = DB::table('contracts')->join('workers','workers.worker_id','=','contracts.workers_worker_id')->get();
        $salaryCount = $salary->count();

        $salary_al = 0;
        foreach($salary as $sal){
            $salary_al += $sal->salary;
        }
        $av_sal_cur = round($salary_al/$salaryCount,2);
        $av_sal_prev = round(400,2);
        $sal_diff = self::diffPerc($av_sal_cur, $av_sal_prev);
        
        $chart2 = new RegisteredUsers;
        $chart2->labels([]);
        $chart2->dataset('Минулий', 'bar', [$av_sal_prev])->backgroundColor("tomato");
        $chart2->dataset('Поточний', 'bar', [$av_sal_cur])->backgroundColor("lightgreen");

        //закупівлі
        $purchs_prev = DB::table('purchases')->whereYear('purch_date', date('Y')-1)->count();
        $purchs_prev = 4;
        $purchs_cur = DB::table('purchases')->whereYear('purch_date', date('Y'))->count();
        $purchs_diff = self::diffPerc($purchs_cur, $purchs_prev);
        //$buildsCount = $builds->count();
        
        return view('economics.economics', [
                                            'income_total' =>  $income_total,
                                            'chart' => $chart, 
                                            'chart2' => $chart2, 
                                             
                                             
                                            'chart5' => $chart5, 
                                            'all_sum' => $all_sum, 
                                            'sums' => $sums, 
                                            'pers' => $pers,
                                            
                                            'av_workers_prev' => $av_workers_prev,
                                            'av_workers_cur' => $av_workers_cur,
                                            'workers_diff' => $workers_diff,

                                            'av_sal_prev' => $av_sal_prev,
                                            'av_sal_cur' => $av_sal_cur,
                                            'sal_diff' => $sal_diff,
                                            
                                            'purchs_prev' => $purchs_prev,
                                            'purchs_cur' => $purchs_cur,
                                            'purchs_diff' => $purchs_diff,
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

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

        
        return view('economics.economics', ['economics' => $economics, 'chart' => $chart, 'chart2' => $chart2, 'chart3' => $chart3, 'chart4' => $chart4, 'chart5' => $chart5, 'all_sum' => $all_sum, 'sums' => $sums, 'pers' => $pers]);
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

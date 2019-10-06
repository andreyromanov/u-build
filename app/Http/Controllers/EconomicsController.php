<?php

namespace App\Http\Controllers;

use App\Economics;
use Illuminate\Http\Request;
use App\Charts\RegisteredUsers;

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
        
        return view('economics.economics', ['economics' => $economics, 'chart' => $chart, 'chart2' => $chart2, 'chart3' => $chart3, 'chart4' => $chart4, 'data' => $data]);
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

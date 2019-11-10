<?php

use Illuminate\Database\Seeder;

class BuildingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildings')->insert([

            [
                'name' => 'BelEtage',
                'budjet' => 1000000,
                'start_date' => '2019-12-12',
                'end_date' => '2020-11-11',
                'users_id' => 1  
            ],
            [
                'name' => 'SkyBox',
                'budjet' => 700000,
                'start_date' => '2019-2-4',
                'end_date' => '2021-11-11',
                'users_id' => 1  
            ],
            [
                'name' => 'London',
                'budjet' => 5000000,
                'start_date' => '2019-7-7',
                'end_date' => '2022-2-2',
                'users_id' => 1  
            ],


            [
                'name' => 'DownTown',
                'budjet' => 10000,
                'start_date' => '2017-12-12',
                'end_date' => '2018-11-11',
                'users_id' => 2  
            ],
            [
                'name' => 'CityHouse',
                'budjet' => 20000,
                'start_date' => '2017-3-8',
                'end_date' => '2018-4-10',
                'users_id' => 2  
            ],

        ]);
    }
}

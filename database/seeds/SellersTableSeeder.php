<?php

use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellers')->insert([

            [
                'name' => 'BuildMaterials'
            ],
            [
                'name' => 'StroyAgency'
            ],
            [
                'name' => 'Buud'
            ]

        ]);
    }
}

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
                'seller' => 'BuildMaterials'
            ],
            [
                'seller' => 'StroyAgency'
            ],
            [
                'seller' => 'Buud'
            ]

        ]);
    }
}

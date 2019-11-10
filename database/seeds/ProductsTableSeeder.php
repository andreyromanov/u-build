<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            [
                'name' => 'дерево',
                'price' => 765,
                'sellers_seller_id' => 1,
            ],
            [
                'name' => 'дерево',
                'price' => 543,
                'sellers_seller_id' => 3, 
            ],
            [
                'name' => 'дерево',
                'price' => 767,
                'sellers_seller_id' => 2,
            ],



            [
                'name' => 'арматура',
                'price' => 1000,
                'sellers_seller_id' => 1,
            ],
            [
                'name' => 'арматура',
                'price' => 1050,
                'sellers_seller_id' => 2, 
            ],
            [
                'name' => 'арматура',
                'price' => 800,
                'sellers_seller_id' => 1,
            ],
            [
                'name' => 'фарба',
                'price' => 359,
                'sellers_seller_id' => 1, 
            ],
            [
                'name' => 'фарба',
                'price' => 350,
                'sellers_seller_id' => 2, 
            ],
            [
                'name' => 'фарба',
                'price' => 369,
                'sellers_seller_id' => 3, 
            ],
            [
                'name' => 'дроти',
                'price' => 50,
                'sellers_seller_id' => 1, 
            ],
            [
                'name' => 'дроти',
                'price' => 50,
                'sellers_seller_id' => 2, 
            ],
            [
                'name' => 'дроти',
                'price' => 55,
                'sellers_seller_id' => 3, 
            ],

        ]);
    }
}

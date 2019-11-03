<?php

use Illuminate\Database\Seeder;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_types')->insert([

            [
                'type_name' => 'Фарбування'
            ],
            [
                'type_name' => 'Загальні роботи'
            ],
            [
                'type_name' => 'Монтаж'
            ]

        ]);
    }
}

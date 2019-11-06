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
            ],
            [
                'type_name' => 'Електрика'
            ],
            [
                'type_name' => 'Сантехнічні'
            ],
            [
                'type_name' => 'Кровельні'
            ],

        ]);
    }
}

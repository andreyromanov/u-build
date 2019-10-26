<?php

use Illuminate\Database\Seeder;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workers')->insert([

            [
                'position' => 'Разнорабочий',
                'name' => 'Петренко Иван',
                'salary' => 250
            ],

            [
                'position' => 'Слесарь',
                'name' => 'Гузев Василий',
                'salary' => 450
            ],

            [
                'position' => 'Сварщик',
                'name' => 'Колочков Сергей',
                'salary' => 500
            ],

            [
                'position' => 'Монтажник',
                'name' => 'Рогов Антон',
                'salary' => 300
            ],
           

        ]);
    }
}

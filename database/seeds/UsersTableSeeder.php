<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('111111'),
                'created_at' => '1996-11-27',
                'updated_at' => '2000-1-1'
            ],
           

        ]);
    }
}

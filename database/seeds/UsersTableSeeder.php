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
        \DB::table('users')->delete();
        \DB::table('users')->insert( array (
            0 => array(
                'id' =>1,
                'username' => 'admin01',
                'full_name' => 'Kanjanaporn',
                'nick_name' => 'Aommy',
                'email' => 'aommy05349@gmail.com',
                'password' => '$2y$10$mSXXOPeFH4CDJm2yjtG8H.AXmF/FotPa7/FiyqwwcMvHfLTt5aWzK',
                'password_confirmation' => '$2y$10$mSXXOPeFH4CDJm2yjtG8H.AXmF/FotPa7/FiyqwwcMvHfLTt5aWzK',
                'level' => 'ADMIN',
                'birthdate' => '2018-12-30',
                'start_working_date' => '2018-12-30',
                'stop_working_date' => '2018-12-30',
                'status' => 'Working',
                'position' => 'PHP Programmer',
                'rank' => '- No Ranking -',
                'contract' => 'Full time',
              
            ),
            
        ));
    }
}

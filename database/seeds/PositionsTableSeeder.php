<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // foreach (range(1, 10) as $index) {
        //     \DB::table('positions')->insert([
        //         'position' => $faker->jobTitle,
 
        //     ]);

        // }
        \DB::table('positions')->delete();
        \DB::table('positions')->insert( array(
            0 => array(
                'users_id' => 1,
                'position' => 'Managing Director'
            ),
            1 => array(
                'users_id' => 2,
                'position' => 'Company Administator'
            ),
            2 => array(
                'users_id' => 3,
                'position' => 'PHP Programmer'
            ),
            3 => array(
                'users_id' => 4,
                'position' => 'Mobile Programmer'
            ),
            4 => array(
                'users_id' => 5,
                'position' => 'Frontend Programmer'
            ),
            5 => array(
                'users_id' => 6,
                'position' => 'Graphic Designer'
            ),
            6 => array(
                'users_id' => 7,
                'position' => 'Quality Assurance'
            ),
            7 => array(
                'users_id' => 8,
                'position' => 'Project Manager'
            ),
            8 => array(
                'users_id' => 9,
                'position' => 'Salesman'
            ),
            9 => array(
                'users_id' => 10,
                'position' => 'Housekeeping'
            ),
        ));
    }
}

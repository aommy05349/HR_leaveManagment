<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // foreach (range(1, 5) as $index) {
        //     \DB::table('statuses')->insert([
        //         'status'  => $faker->randomElement(array(
        //                         'Working',
        //                         'Resign',
        //                         'Out of Contract',
        //                         'Not Pass Probation',
        //                         'Fired')),
        //     ]);
        // }
        \DB::table('statuses')->delete();
        \DB::table('statuses')->insert( array (
            0 => array(
                'users_id' =>1,
                'status' => 'Working'
            ),
            1 => array(
                'users_id' =>2,
                'status' => 'Resign'
            ),
            2 => array(
                'users_id' =>3,
                'status' => 'Out of Contract'
            ),
            3 => array(
                'users_id' => 4,
                'status' => 'Not Pass Probation'
            ),
            4 => array(
                'users_id' => 5,
                'status' => 'Fired'
            ),
        ));
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RankingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // foreach (range(1, 4) as $index) {
        //     \DB::table('rankings')->insert([
        //         'rankings'  => $faker->randomElement(array('- No Ranking -','Junior','Senior', 'Middle')),
 
        //     ]);
        // }
        \DB::table('rankings')->delete();
        \DB::table('rankings')->insert( array (
            0 => array(
                'users_id' =>1,
                'rankings' => '- No Ranking -'
            ),
            1 => array(
                'users_id' =>2,
                'rankings' => 'Junior'
            ),
            2 => array(
                'users_id' =>3,
                'rankings' => 'Middle'
            ),
            3 => array(
                'users_id' =>4,
                'rankings' => 'Senior'
            ),
        ));
    }
}

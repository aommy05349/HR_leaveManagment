<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // foreach (range(1, 3) as $index) {
        //     \DB::table('contracts')->insert([
        //         'contracts'  => $faker->randomElement(array(
        //                         'Probation',
        //                         'Full time',
        //                         'Internship',
        //                         )),
 
        //     ]);

        // }
        \DB::table('contracts')->delete();
        \DB::table('contracts')->insert( array (
            0 => array(
                'users_id' =>1,
                'contracts' => 'Probation'
            ),
            1 => array(
                'users_id' =>2,
                'contracts' => 'Full time'
            ),
            2 => array(
                'users_id' =>3,
                'contracts' => 'Internship'
            ),
        ));
    }
}

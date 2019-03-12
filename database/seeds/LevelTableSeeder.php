<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('levels')->delete();
        \DB::table('levels')->insert( array (
            0 => array(
                'users_id' =>1,
                'level' => 'ADMIN'
            ),
            1 => array(
                'users_id' =>2,
                'level' => 'EMPLOYEE'
            ),
            
            
        ));
    }
    
}

<?php

use Illuminate\Database\Seeder;

class LeaveTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('leave_types')->delete();
        \DB::table('leave_types')->insert( array (
            0 => array(
                'users_id' =>1,
                'leavetype' => 'Sick Leave'
            ),
            1 => array(
                'users_id' =>2,
                'leavetype' => 'Personal Leave '
            ),
           
            
        ));
    }
}

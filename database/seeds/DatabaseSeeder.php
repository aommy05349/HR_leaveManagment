<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([  
                    PositionsTableSeeder::class,
                    RankingsTableSeeder::class,
                    StatusesTableSeeder::class,
                    ContractTableSeeder::class,
                    LeaveTypeTableSeeder::class,
                    LevelTableSeeder::class,
                    UsersTableSeeder::class,
            ]);
    }
}

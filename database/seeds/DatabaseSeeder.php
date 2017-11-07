<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => 'asadventurecontest@alessandro.aussems.mtantwerp.eu',
            'password' => bcrypt('asadmin1'),
        ]);
        DB::table('adminmail')->insert([
            'email' => 'asadventurecontest@alessandro.aussems.mtantwerp.eu',
        ]);
        DB::table('periods')->insert([
            [
            'title' => 'Period 1',
            'startdate' => date('Y-m-d','1506816000'),
            'enddate' => date('Y-m-d','1509408000')
            ],
            [
            'title' => 'Period 2',
            'startdate' => date('Y-m-d','1509494400'),
            'enddate' => date('Y-m-d','1512000000')
            ],
            [
            'title' => 'Period 3',
            'startdate' => date('Y-m-d','1512086400'),
            'enddate' => date('Y-m-d','1514678400')
            ],
            [
            'title' => 'Period 4',
            'startdate' => date('Y-m-d','1514764800'),
            'enddate' => date('Y-m-d','1517356800')
            ]
            ]
        );
    }
}

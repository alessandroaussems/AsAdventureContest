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
    }
}

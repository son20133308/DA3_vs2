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
        // $this->call(tbl_theloaiSeeder::class);
        $this->call(UserSeeder::class);
    }
}

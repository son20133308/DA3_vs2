<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        	[
        	[
        		'name' =>'nam',
        		'email' =>'admin1@gmail.com',
        		'password'=>Hash::make('111111'),
                'role'=>1
        	],
        	[
        		'name' =>'son',
        		'email' =>'admin2@gmail.com',
        		'password'=>Hash::make('111111'),
                'role'=>0
        	],
        	[
        		'name' =>'quang',
        		'email' =>'admin3@gmail.com',
        		'password'=>Hash::make('111111'),
                'role'=>0
        	],
        	[
        		'name' =>'thiet',
        		'email' =>'admin4@gmail.com',
        		'password'=>Hash::make('111111'),
                'role'=>0
        	]
        	]
        );
    }
}

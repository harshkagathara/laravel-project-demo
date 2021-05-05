<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'usertype'=> 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '+123456890',
            'password' => '123456789',
           
        ]);
        DB::table('users')->insert([
            'name' => 'harsh',
            'usertype'=> 'owner',
            'email' => 'owner1@gmail.com',
            'phone' => '+123456890',
            'password' => '123456789',
           
        ]);
        DB::table('users')->insert([
            'name' => 'dhiraj',
            'usertype'=> 'owner',
            'email' => 'owner2@gmail.com',
            'phone' => '+123456890',
            'password' => '123456789',
           
        ]);
    }
}

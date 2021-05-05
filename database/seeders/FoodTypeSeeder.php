<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class FoodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('foodtypes')->insert([
            'name' => 'American',
            ]);
        DB::table('foodtypes')->insert([
                'name' => 'Asian',
            ]);
        DB::table('foodtypes')->insert([
                'name' => 'Indian',
            ]);
        DB::table('foodtypes')->insert([
                'name' => 'Italian',
            ]);
        DB::table('foodtypes')->insert([
                'name' => 'Cafe & Bakery',
            ]);
        DB::table('foodtypes')->insert([
                'name' => 'Middle Eastern',
            ]);
        DB::table('foodtypes')->insert([
            'name' => 'Healthy',
        ]);
        DB::table('foodtypes')->insert([
            'name' => 'Mediterranean',
        ]);
           
           
       

    }
}

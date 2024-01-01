<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
        public function run()
    {
        
        // Using Query Builder
        DB::table('slider')->insert([
            'category_name' => 'STD',
            'category_position' => '9090909090',
            'category_status'=>'active'
            
            
        ]);

        // You can add more users here
    }
    
}

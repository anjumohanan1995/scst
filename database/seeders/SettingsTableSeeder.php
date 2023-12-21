<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
        public function run()
    {
        
        // Using Query Builder
        DB::table('settings')->insert([
            'project_title' => 'STD',
            'mobile' => '9090909090'
            
            
        ]);

        // You can add more users here
    }
    
}

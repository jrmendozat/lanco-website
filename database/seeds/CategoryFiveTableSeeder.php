<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Categoryfive;

class CategoryFiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'General', 
                'slug' => 'General', 
                'description' => 'General', 
                'color' => '#440022',
            ],
            
        );    
        Categoryfive::insert($data);
       

    }
}

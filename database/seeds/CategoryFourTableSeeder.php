<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Categoryfour;

class CategoryFourTableSeeder extends Seeder
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
        Categoryfour::insert($data);
       

    }
}

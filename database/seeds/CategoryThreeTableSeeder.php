<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Categorythree;

class CategoryThreeTableSeeder extends Seeder
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
        Categorythree::insert($data);
       

    }
}

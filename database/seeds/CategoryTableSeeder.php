<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryTableSeeder extends Seeder
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
                'name'          => 'Lubricantes', 
                'slug'          => 'Lubricantes', 
                'description'   => 'Lubricantes', 
                'image' 		=> '',
                'color'         => '#440022',
                'TypeDemo'      => 'notdemo',
            ],

            [
                'name'          => 'Especialidades', 
                'slug'          => 'Especialidades', 
                'description'   => 'Especialidades', 
                'image' 		=> '',
                'color'         => '#440022',
                'TypeDemo'      => 'notdemo',
            ],

            
            

        );    
        Category::insert($data);


    }
}



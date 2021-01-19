<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Categorytwo;

class CategoryTwoTableSeeder extends Seeder
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
                'name' => 'Motores a Gasolina', 
                'slug' => 'L-MG-001', 
                'description' => 'Motores Gasolina', 
                'image' => '',
                'color' => '#440022',
            ],

            [
                'name' => 'Motores a Diesel', 
                'slug' => 'L-MD-001', 
                'description' => 'Motores Diesel', 
                'image' => '',
                'color' => '#440022',
            ],

            [
                'name' => 'Motocicletas', 
                'slug' => 'L-MT-001', 
                'description' => 'Motocicletas', 
                'image' => '',
                'color' => '#440022',
            ],

            [
                'name' => 'Marinos', 
                'slug' => 'L-MA-001', 
                'description' => 'Marinos', 
                'image' => '',
                'color' => '#440022',
            ],

            [
                'name' => 'Transmición Automotriz', 
                'slug' => 'L-TA-001', 
                'description' => 'Transmición Automática', 
                'image' => '',
                'color' => '#440022',
            ],

            [
                'name' => 'Industrial', 
                'slug' => 'L-IN-001', 
                'description' => 'Industrial', 
                'image' => '',
                'color' => '#440022',
            ],

            [
                'name' => 'Liga Para Frenos', 
                'slug' => 'E-LF-001', 
                'description' => 'Liga Para Frenos', 
                'image' => '',
                'color' => '#440022',
            ],

            [
                'name' => 'Refrigerantes', 
                'slug' => 'E-RE-001', 
                'description' => 'Refrigerantes', 
                'image' => '',
                'color' => '#440022',
            ],
            
        );    
        Categorytwo::insert($data);
       

    }
}

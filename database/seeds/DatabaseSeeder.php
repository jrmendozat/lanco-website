<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard(); 
        $this->call(UsersTableSeeder::class);
        $this->call(config_quoteandsellSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CategoryTwoTableSeeder::class);
        $this->call(CategoryThreeTableSeeder::class);
        $this->call(CategoryFourTableSeeder::class);
        $this->call(CategoryFiveTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        
        Eloquent::reguard();
        
    }
}

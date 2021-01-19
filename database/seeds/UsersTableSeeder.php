<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
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
				'name' 		  		=> 'dont', 
				'last_name'   		=> 'AuthCheck', 
				'email' 	  		=> 'dauthcheck@gmail.com', 
				'user' 		  		=> 'dauthchec',
				'password' 	  		=> \Hash::make('UC-12345'),
				'user_type'   		=> 'user',
				'active' 	  		=> 1,
				'address' 	  		=> 'Venezuela',
				'cell_phone'  		=> '00000000000',
				'local_phone' 		=> '00000000000',
				'rif_Invoice'		=> '',
				'name_invoice'		=> '',
				'adress_invoice'	=> '',
				'create_by'         => 'seeder',
				'seller_assigned'   => '',
				'vip'               => 1,
				'created_at'		=> new DateTime,
				'updated_at'		=> new DateTime
			],
			[
				'name' 		  		=> 'Daniel', 
				'last_name'   		=> 'Liberatore', 
				'email' 	  		=> 'dliberatore@gmail.com', 
				'user' 		  		=> 'dliberatore',
				'password' 	  		=> \Hash::make('Fsnd-0203'),
				'user_type'   		=> 'createmode',
				'active' 	  		=> 1,
				'address' 	  		=> 'Cabudare, Venezuela',
				'cell_phone'  		=> '04122695010',
				'local_phone' 		=> '02512635604',
				'rif_Invoice'		=> '',
				'name_invoice'		=> '',
				'adress_invoice'	=> '',
				'create_by'         => 'seeder',
				'seller_assigned'   => '',
				'vip'               => 1,
				'created_at'		=> new DateTime,
				'updated_at'		=> new DateTime
			],
			[
				'name' 		=> 'Argenis', 
				'last_name' => 'Polanco', 
				'email' 	=> 'argenisjpolanco@gmail.com', 
				'user' 		=> 'superadmin',
				'password' 	=> \Hash::make('AP-2019+AG'),
				'user_type' => 'superadmin',
				'active' 	=> 1,
				'address' 	=> 'Barquisimeto, Venezuela',
				'cell_phone'  => '4245079262',
				'local_phone' => '00000000001',
				'rif_Invoice'		=> '',
				'name_invoice'		=> '',
				'adress_invoice'	=> '',
				'create_by'         => 'seeder',
				'seller_assigned'   => '',
				'vip'               => 1,
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			
			
			
		);

        User::insert($data);
    }    
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('last_name', 100)->nullable();
            $table->string('email')->unique();
            $table->string('user', 50)->nullable();
            $table->string('password', 60);
            $table->string('user_type',50 )->default('user');
            $table->boolean('active');
            $table->text('address')->nullable();
            $table->string('cell_phone',11)->unique();
            $table->string('local_phone',11)->nullable();
            $table->string('rif_Invoice',15)->nullable();
            $table->string('name_invoice',100)->nullable();
            $table->text('adress_invoice')->nullable();
            $table->string('create_by',100)->nullable();
            $table->string('seller_assigned',100)->nullable();
            $table->boolean('vip')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

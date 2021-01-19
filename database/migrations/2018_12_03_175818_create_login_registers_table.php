<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

   
                           
    public function up()
    {
        Schema::create('LoginRegister', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_access',50)->nullable();
            $table->string('country_access',50)->nullable();
            $table->enum('view_type_products', ['List', 'Pinterest-sl','Pinterest-sm','Pinterest-ss']);
            $table->enum('view_type_scream', ['Full', 'ByCategory']);
            $table->string('Category_id',150)->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('login_registers');
    }
}

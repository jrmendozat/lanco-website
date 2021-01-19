<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->unique();
            $table->string('slug');
            $table->text('description');
            $table->string('color', 30);
            $table->string('image', 300)->nullable();
            $table->enum('TypeDemo', ['autoparts','fashionshop','personalcare','foodstore','toystore','tecnologystore','giftsandflowers,','professionalservice','notdemo']);
            //$table->timestamps();
        });
    }

    //id MEDIUMINT NOT NULL AUTO_INCREMENT,
    //name CHAR(30) NOT NULL,

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

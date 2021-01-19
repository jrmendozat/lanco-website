<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('sku', 255)->nullable();
            $table->string('upc', 255)->nullable();
            $table->string('partnumber', 255)->nullable();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('extract', 300)->nullable();
            $table->string('image', 300)->nullable();
            $table->string('image_2', 300)->nullable();
            $table->string('image_3', 300)->nullable();
            $table->string('image_4', 300)->nullable();
            $table->string('image_5', 300)->nullable();
            $table->text('data_sheet_1')->nullable();
            $table->text('data_sheet_2')->nullable();
            $table->text('data_sheet_3')->nullable();
            $table->string('title_sheet_1', 100)->nullable();
            $table->string('title_sheet_2', 100)->nullable();
            $table->string('title_sheet_3', 100)->nullable();
            $table->string('download_1', 300)->nullable();
            $table->string('download_2', 300)->nullable();
            $table->string('download_3', 300)->nullable();
            $table->string('title_download_1', 100)->nullable();
            $table->string('title_download_2', 100)->nullable();
            $table->string('title_download_3', 100)->nullable();
            $table->boolean('visible')->default(1);
            $table->double('stock')->default(0);
            $table->string('unitPrice', 1)->nullable();
            $table->string('product_presentation', 1)->nullable();
            $table->decimal('estimated_weight', 6, 3)->nullable();            
            $table->decimal('price', 12, 3)->nullable();
            $table->decimal('price_dealer', 12, 3)->nullable();
            $table->decimal('tax', 6, 3)->nullable();
            $table->string('field_1',20)->nullable();
            $table->string('field_2',20)->nullable();
            $table->string('field_3',20)->nullable();
            $table->string('field_4',20)->nullable();
            $table->string('field_5',20)->nullable();
            $table->boolean('vip')->default(0);
            $table->string('TypeDemo',20)->nullable();
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->Integer('categorytwo_id');
            $table->Integer('categorythree_id');
            $table->Integer('categoryfour_id');
            $table->Integer('categoryfive_id');
            
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
        Schema::dropIfExists('products');
    }
}

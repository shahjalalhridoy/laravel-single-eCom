<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->bigInteger('sub_category_id');
            $table->string('product_name');
            $table->string('product_price');
            $table->text('product_short_desc');
            $table->text('product_long_desc');
            $table->string('product_category_name');
            $table->string('product_sub_category_name');
            $table->string('product_image');            
            $table->integer('product_slug')->default(0);
            $table->integer('product_status')->default(1);
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
};

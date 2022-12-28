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
            $table->bigIncrements('id');
            $table->integer('cat_id');
            $table->integer('SubCat_id');
            $table->integer('Brand_id');
            $table->integer('unit_id');
            $table->integer('size_id');
            $table->integer('color_id');
            $table->string('code');
            $table->string('name');
            $table->longText('desc');
            $table->longText('MetaDesc');
            $table->float('price');
            $table->string('oldPrice');
            $table->string('image');
            $table->string('status')->default('1');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->string('unit');
            $table->string('capital_price');
            $table->string('price');
            $table->string('reseller_price');
            $table->integer('stock');
            $table->string('description');
            $table->unsignedBigInteger('category_id');
            $table->string('material');
            $table->string('color');
            $table->string('laminate');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('weight');
            $table->string('photo', 50);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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

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
            $table->integer('parent_id')->nullable();
            $table->integer('category_id')->unsiged()->nullable();
            $table->integer('brand_id')->unsiged()->nullable();
            $table->string('name');
            $table->integer('price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->string('seo_title')->nullable()->default(null);
            $table->text('	meta_description')->nullable()->default(null);
            $table->text('	meta_keywords')->nullable()->default(null);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('featured')->default(0);
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

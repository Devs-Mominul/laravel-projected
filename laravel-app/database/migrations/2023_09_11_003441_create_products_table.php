<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();
            $table->string('catagory');
            $table->string('subcatagory_id');
            $table->string('brand_id')->nullable();
            $table->string('product_name',100);
            $table->integer('product_price');
            $table->integer('discount')->nullable();
            $table->integer('after_discount');
            $table->string('tags[]');
            $table->string('short_desp')->nullable();
            $table->longText('long_desp');
            $table->string('add_desp')->nullable();
            $table->string('preview');
            $table->string('slug');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

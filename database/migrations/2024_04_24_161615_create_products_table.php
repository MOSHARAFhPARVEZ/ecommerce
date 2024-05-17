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
            $table->string('product_name');
            $table->string('product_category');
            $table->float('purchase_price',10,2);
            $table->float('regular_price',10,2);
            $table->float('discount_price',10,2)->nullable();
            $table->longText('description');
            $table->longText('long_description');
            $table->longText('addi_info');
            $table->longText('photo')->nullable();
            $table->longText('gal_photo')->nullable();
            $table->string('sizes')->nullable();
            $table->string('colors')->nullable();
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

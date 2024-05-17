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
        Schema::create('homebanners', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('product_name');
            $table->string('description');
            $table->string('regular_price');
            $table->string('discount_price');
            $table->string('homebanner_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homebanners');
    }
};

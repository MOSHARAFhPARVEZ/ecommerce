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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('coustomer_id');
            $table->string('order_id');
            $table->string('name');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('phone');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('notes')->nullable();
            $table->string('discount')->nullable();
            $table->string('charge');
            $table->string('total');
            $table->string('order_stutas')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

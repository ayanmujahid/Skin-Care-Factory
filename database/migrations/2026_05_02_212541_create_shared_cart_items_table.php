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
        Schema::create('shared_cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shared_cart_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('shared_cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shared_cart_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity');
        });
    }
};

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
        Schema::create('shared_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professional_id')->constrained('users');
            $table->string('token')->unique(); // shareable link
            $table->decimal('discount_percent')->default(0);
            $table->integer('points_used')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shared_carts');
    }
};

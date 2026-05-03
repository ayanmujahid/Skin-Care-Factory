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
        Schema::create('points_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professional_id')->constrained('users');
            $table->integer('points');
            $table->enum('type', ['earn', 'spend', 'adjust']);
            $table->string('reference')->nullable(); // order id etc
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points_transactions');
    }
};

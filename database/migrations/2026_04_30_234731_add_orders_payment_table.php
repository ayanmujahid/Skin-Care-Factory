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
        //
        Schema::table('orders', function (Blueprint $table) {
            $table->string('status')->default('pending');
            // pending | paid | failed | cancelled

            $table->string('payment_method')->nullable();
            // stripe | card_terminal | cash | etc

            $table->string('payment_intent_id')->nullable();
            // Stripe PaymentIntent ID

            $table->string('transaction_id')->nullable();
            // generic reference (POS / Stripe / etc)

            $table->timestamp('paid_at')->nullable();

            $table->boolean('is_locked')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

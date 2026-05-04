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
        Schema::table('shared_carts', function (Blueprint $table) {
            $table->string('share_link')->nullable()->after('token');
            $table->timestamp('locked_at')->nullable();
            $table->boolean('is_locked')->default(false);
            $table->boolean('is_paid')->default(false);
            $table->timestamp('paid_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shared_carts', function (Blueprint $table) {
            $table->dropColumn([
                'share_link',
                'locked_at',
                'is_locked',
                'is_paid',
                'paid_at'
            ]);
        });
    }
};

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
        Schema::table('shared_cart_items', function (Blueprint $table) {

            // only run if column does NOT exist
            if (!Schema::hasColumn('shared_cart_items', 'variant_id')) {

                $table->unsignedBigInteger('variant_id')->after('shared_cart_id');

                $table->foreign('variant_id')
                    ->references('id')
                    ->on('product_variants')
                    ->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('shared_cart_items', function (Blueprint $table) {

            if (Schema::hasColumn('shared_cart_items', 'variant_id')) {
                $table->dropForeign(['variant_id']);
                $table->dropColumn('variant_id');
            }
        });
    }
};

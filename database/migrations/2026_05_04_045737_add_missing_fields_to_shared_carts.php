<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('shared_carts', function (Blueprint $table) {
            $table->string('status')->default('active')->after('points_used');
            $table->timestamp('expires_at')->nullable()->after('status');
        });
    }

    public function down()
    {
        Schema::table('shared_carts', function (Blueprint $table) {
            $table->dropColumn(['status', 'expires_at']);
        });
    }
};

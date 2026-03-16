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
        Schema::create('professional_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');

            $table->string('professional_type');

            $table->string('license_number')->nullable();
            $table->string('license_state')->nullable();
            $table->date('license_expiration')->nullable();
            $table->string('license_upload')->nullable();

            $table->string('business_name')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
            $table->string('tax_id')->nullable();
            $table->text('business_address')->nullable();

            // student fields
            $table->string('school_name')->nullable();
            $table->string('program_enrolled')->nullable();
            $table->date('expected_graduation')->nullable();
            $table->string('student_id_upload')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_profiles');
    }
};

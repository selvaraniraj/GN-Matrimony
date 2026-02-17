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
        Schema::create('user_otp_verifies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('otp_code')->nullable();
                $table->enum('otp_type',['send', 'resend'])->default('send');
            $table->timestamp('delivery_time')->nullable();
            $table->boolean('delivery_status')->default(0);
            $table->boolean('otp_verify_status')->default(0);
            $table->timestamp('otp_verified_time')->nullable();
            $table->boolean('otp_invalid_attempts')->nullable();
            $table->boolean('otp_expired_attempts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_otp_verifies');
    }
};

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
        Schema::create('member_addional_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->string('body_type')->nullable();
            $table->unsignedBigInteger('height_id');
            $table->foreign('height_id')->references('id')->on('heights');
            $table->unsignedBigInteger('weight_id');
            $table->foreign('weight_id')->references('id')->on('weights');
            $table->boolean('disablitiy')->default(0);
            $table->boolean('drinking_habit')->default(0);
            $table->boolean('smoking_habit')->default(0);
            $table->string('about_you')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_addional_details');
    }
};

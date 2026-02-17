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
        Schema::create('liked_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->unsignedBigInteger('liked_profile')->nullable();
            $table->foreign('liked_profile')->references('id')->on('members');
            $table->integer('liked_flag')->nullable();
            $table->unsignedBigInteger('unliked_profile')->nullable();
            $table->foreign('unliked_profile')->references('id')->on('members');
            $table->integer('unliked_flag')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liked_profiles');
    }
};

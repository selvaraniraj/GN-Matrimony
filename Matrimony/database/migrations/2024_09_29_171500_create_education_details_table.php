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
        Schema::create('education_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('education_id');
            $table->foreign('education_id')->references('id')->on('educations');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->string('degree')->nullable();
            $table->string('department')->nullable();
            $table->string('organization')->nullable();
            $table->string('location')->nullable();
            $table->string('mark_percentage')->nullable();
            $table->string('completed_year')->nullable();
            $table->enum('medium',['tamil', 'english', 'hindi']);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_details');
    }
};

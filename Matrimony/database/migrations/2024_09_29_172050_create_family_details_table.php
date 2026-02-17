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
        Schema::create('family_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->string('family_status')->nullable();
            $table->string('family_type')->nullable();
            $table->string('family_values')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_status')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_status')->nullable();
            $table->integer('number_of_brothers')->nullable();
            $table->string('brothers_married')->nullable();
            $table->integer('number_of_sisters')->nullable();
            $table->string('sisters_married')->nullable();
            $table->string('family_locations')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_details');
    }
};

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
        Schema::create('horoscope_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->string('rasi_1', 100)->nullable();
            $table->string('rasi_2', 100)->nullable();
            $table->string('rasi_3', 100)->nullable();
            $table->string('rasi_4', 100)->nullable();
            $table->string('rasi_5', 100)->nullable();
            $table->string('rasi_6', 100)->nullable();
            $table->string('rasi_7', 100)->nullable();
            $table->string('rasi_8', 100)->nullable();
            $table->string('rasi_9', 100)->nullable();
            $table->string('rasi_10', 100)->nullable();
            $table->string('rasi_11', 100)->nullable();
            $table->string('rasi_12', 100)->nullable();
            $table->string('Navamsam_1', 100)->nullable();
            $table->string('Navamsam_2', 100)->nullable();
            $table->string('Navamsam_3', 100)->nullable();
            $table->string('Navamsam_4', 100)->nullable();
            $table->string('Navamsam_5', 100)->nullable();
            $table->string('Navamsam_6', 100)->nullable();
            $table->string('Navamsam_7', 100)->nullable();
            $table->string('Navamsam_8', 100)->nullable();
            $table->string('Navamsam_9', 100)->nullable();
            $table->string('Navamsam_10', 100)->nullable();
            $table->string('Navamsam_11', 100)->nullable();
            $table->string('Navamsam_12', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horoscope_detail');
    }
};

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
        Schema::create('relative', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->string('first_relative_name')->nullable();
            $table->string('first_relative_relation')->nullable();
            $table->string('first_relative_bussiness')->nullable();
            $table->string('first_relative_number', 20)->nullable();
            $table->string('second_relative_name')->nullable();
            $table->string('second_relative_relation')->nullable();
            $table->string('second_relative_bussiness')->nullable();
            $table->string('second_relative_number', 20)->nullable();
            $table->string('third_relative_name')->nullable();
            $table->string('third_relative_relation')->nullable();
            $table->string('third_relative_bussiness')->nullable();
            $table->string('third_relative_number', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relative');
    }
};

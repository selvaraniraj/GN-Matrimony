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
        Schema::create('user_log', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('members');
    
            // Other columns
            $table->datetime('create_date')->nullable();
            $table->string('message', 200)->nullable();
            $table->integer('flag')->nullable();
            $table->datetime('upprove_date')->nullable();
            $table->string('upproved_by', 50)->nullable();
            $table->integer('status')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_log');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('association_name', 200)->nullable();
            $table->string('association_phoneno', 20)->nullable();
            $table->string('secretary_number', 50)->nullable();
            $table->string('head_numer', 50)->nullable();
            $table->string('association_regno', 50)->nullable();
            $table->string('treasurer_number', 50)->nullable();
            $table->string('secretary', 200)->nullable();
            $table->string('association_head', 200)->nullable();
            $table->text('address')->nullable();
            $table->string('state', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('taluk', 100)->nullable();
            $table->string('village', 50)->nullable();
            $table->string('image', 200)->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('association');
    }
};

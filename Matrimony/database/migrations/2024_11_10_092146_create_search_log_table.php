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
            Schema::create('search_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->string('age' , 100)->nullable();
            $table->string('age1', 100)->nullable();
            $table->string('height')->nullable();
            $table->string('height2')->nullable();
            $table->string('re_religion', 100)->nullable();
            $table->string('mother_tongue', 100)->nullable();
            $table->string('subcaste', 100)->nullable();
            $table->string('star', 100)->nullable();
            $table->string('education', 100)->nullable();
            $table->string('income', 100)->nullable();
            $table->string('showprofilewith', 100)->nullable();
            $table->string('dontshow', 100)->nullable();
            $table->string('key_age', 100)->nullable();
            $table->string('key_age1', 100)->nullable();
            $table->string('key_height', 100)->nullable();
            $table->string('key_height1', 100)->nullable();
            $table->string('key_word', 100)->nullable();
            $table->string('key_showprofilewith', 100)->nullable();
            $table->string('key_dontshow', 100)->nullable();
            $table->string('matrimony_id', 100)->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_log');
    }
};

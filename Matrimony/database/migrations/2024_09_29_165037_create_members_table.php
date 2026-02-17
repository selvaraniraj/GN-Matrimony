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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->string('association', 50);
            $table->unsignedBigInteger('profile_created_by');
            $table->foreign('profile_created_by')->references('id')->on('users');
            $table->string('name', 200);
            $table->enum('gender',['male', 'female']);
            $table->string('mobile', 20);
            $table->string('email')->nullable();
            $table->string('otp', 50)->nullable();
            $table->date('dob')->nullable();
            $table->integer('age');
            $table->boolean('verify_by')->default(0);
            $table->boolean('subscribe_flag')->default(0);
            $table->enum('marriage_status',['married', 'unmarried']);
            $table->integer('rating')->nullable();
            $table->string('religion')->nullable();
            $table->string('subcaste')->nullable();
            $table->string('language')->nullable();
            $table->string('otherlanguage');
            $table->string('mothertongue')->nullable();
            $table->boolean('maritalstatus')->default(0);
            $table->boolean('children')->default(0);
            $table->integer('height')->nullable();
            $table->string('familystatus')->nullable();
            $table->string('familytype')->nullable();
            $table->string('familyvalue')->nullable();
            $table->boolean('disability')->default(0);
            $table->string('caste')->nullable();
            $table->integer('dosham')->nullable();
            $table->integer('doshamdetail')->nullable();
            $table->string('education', 100)->nullable();
            $table->string('occupation', 100)->nullable();
            $table->string('annualincome', 100)->nullable();
            $table->text('worklocation')->nullable();
            $table->string('state', 100)->nullable();
            $table->string('city', 200)->nullable();
            $table->string('taluk', 50);
            $table->text('about_you')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

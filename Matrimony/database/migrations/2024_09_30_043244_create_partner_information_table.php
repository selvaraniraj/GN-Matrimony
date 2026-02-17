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
        Schema::create('partner_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->integer('age')->nullable();
            $table->unsignedBigInteger('height_id');
            $table->foreign('height_id')->references('id')->on('heights');
            $table->unsignedBigInteger('weight_id');
            $table->foreign('weight_id')->references('id')->on('weights');
            $table->unsignedBigInteger('mother_tongue');
            $table->foreign('mother_tongue')->references('id')->on('languages');
            $table->enum('marital_status', ['married', 'unmarried'])->nullable();
            $table->string('caste')->nullable();
            $table->unsignedBigInteger('star_id');
            $table->foreign('star_id')->references('id')->on('stars');
            $table->unsignedBigInteger('raasi_id');
            $table->foreign('raasi_id')->references('id')->on('raasis');
            $table->unsignedBigInteger('dosam_id');
            $table->foreign('dosam_id')->references('id')->on('dosam_details');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('education_id');
            $table->foreign('education_id')->references('id')->on('educations');
            $table->unsignedBigInteger('occupation_id');
            $table->foreign('occupation_id')->references('id')->on('occupations');
            $table->string('income')->nullable();
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
        Schema::dropIfExists('partner_information');
    }
};

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
        Schema::table('partner_information', function (Blueprint $table) {
            $table->dropForeign(['weight_id']);
            $table->dropForeign(['raasi_id']);
            $table->dropForeign(['dosam_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['education_id']);
            $table->dropForeign(['occupation_id']);

            $table->dropColumn('weight_id');
            $table->dropColumn('raasi_id');
            $table->dropColumn('dosam_id');
            $table->dropColumn('country_id');
            $table->dropColumn('education_id');
            $table->dropColumn('occupation_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partner_information', function (Blueprint $table) {
            $table->unsignedBigInteger('weight_id')->nullable();
            $table->unsignedBigInteger('raasi_id')->nullable();
            $table->unsignedBigInteger('dosam_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('education_id')->nullable();
            $table->unsignedBigInteger('occupation_id')->nullable();

            $table->foreign('weight_id')->references('id')->on('weights');
            $table->foreign('raasi_id')->references('id')->on('raasis');
            $table->foreign('dosam_id')->references('id')->on('dosam_details');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('education_id')->references('id')->on('educations');
            $table->foreign('occupation_id')->references('id')->on('occupations');
        });
    }
};

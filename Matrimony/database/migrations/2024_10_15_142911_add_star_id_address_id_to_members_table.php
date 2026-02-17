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
        Schema::table('members', function (Blueprint $table) {
            $table->unsignedBigInteger('raasi_id')->after('profile_created_by')->nullable();
            $table->foreign('raasi_id')->references('id')->on('raasis');
            $table->unsignedBigInteger('star_id')->after('raasi_id')->nullable();
            $table->foreign('star_id')->references('id')->on('stars');
            $table->unsignedBigInteger('permanent_state_id')->after('star_id')->nullable();
            $table->foreign('permanent_state_id')->references('id')->on('states');
            $table->unsignedBigInteger('permanent_city_id')->after('permanent_state_id')->nullable();
            $table->foreign('permanent_city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('permanent_taulk_id')->after('permanent_city_id')->nullable();
            $table->foreign('permanent_taulk_id')->references('id')->on('talukas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign(['raasi_id']);
            $table->dropColumn('raasi_id');
            $table->dropForeign(['star_id']);
            $table->dropColumn('star_id');
            $table->dropForeign(['state_id']);
            $table->dropColumn('state_id');
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
            $table->dropForeign(['taulk_id']);
            $table->dropColumn('taulk_id');
        });
    }
};

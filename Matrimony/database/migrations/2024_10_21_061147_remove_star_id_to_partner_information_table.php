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
            $table->dropForeign(['star_id']);
            $table->dropColumn('star_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partner_information', function (Blueprint $table) {
            $table->unsignedBigInteger('star_id')->nullable();
            $table->foreign('star_id')->references('id')->on('stars');
        });
    }
};

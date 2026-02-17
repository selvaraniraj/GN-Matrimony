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
            $table->dropForeign(['mother_tongue']);
            $table->dropColumn('mother_tongue');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partner_information', function (Blueprint $table) {
            $table->unsignedBigInteger('mother_tongue')->nullable();
            $table->foreign('mother_tongue')->references('id')->on('languages');
        });
    }
};

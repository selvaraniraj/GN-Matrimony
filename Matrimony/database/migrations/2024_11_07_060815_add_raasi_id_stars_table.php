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
        Schema::table('stars', function (Blueprint $table) {
            $table->unsignedBigInteger('raasi_id')->after('id')->nullable();
            $table->foreign('raasi_id')->references('id')->on('raasis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stars', function (Blueprint $table) {
            $table->dropForeign(['raasi_id']);
            $table->dropColumn('raasi_id');
        });
    }
};

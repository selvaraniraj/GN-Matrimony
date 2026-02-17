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
        Schema::table('education_details', function (Blueprint $table) {
            $table->dropForeign(['education_id']);
            // Drop the column
            $table->dropColumn('education_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('education_details', function (Blueprint $table) {
            $table->unsignedBigInteger('education_id')->nullable();
            // Restore foreign key constraint
            $table->foreign('education_id')->references('id')->on('educations')->onDelete('cascade');
        });
    }
};

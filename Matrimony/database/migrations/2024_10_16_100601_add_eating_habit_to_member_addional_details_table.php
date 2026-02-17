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
        Schema::table('member_addional_details', function (Blueprint $table) {
            $table->boolean('eating_habit')->default(0)->after('disablitiy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_addional_details', function (Blueprint $table) {
            $table->dropColumn('eating_habit');
        });
    }
};

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
        Schema::table('member_activity_logs', function (Blueprint $table) {
            $table->string('upproved_by')->nullable()->after('user_id'); 
            $table->integer('status')->nullable()->after('upproved_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_activity_logs', function (Blueprint $table) {
            $table->dropColumn('upproved_by');
            $table->dropColumn('status');
        });
    }
};

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
            $table->string('religion')->nullable()->after('marital_status');
            $table->string('mother_tongue')->nullable()->after('religion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partner_information', function (Blueprint $table) {
            $table->dropColumn('religion');
           $table->dropColumn('mother_tongue');
        });
    }
};

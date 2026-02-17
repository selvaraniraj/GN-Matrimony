<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    // php artisan make:migration add_village_temple_to_members_table --table=members

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('village_temple')->nullable()->after('familyvalue');
            $table->string('family_god')->nullable()->after('familyvalue');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('village_temple');
            $table->dropColumn('family_god');
        });
    }
};

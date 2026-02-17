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
            $table->string('hours')->nullable()->after('doshamdetail');
            $table->string('mins')->nullable()->after('hours');
            $table->string('am_pm')->nullable()->after('mins');
            $table->text('horoscope_image')->nullable()->after('am_pm');
            $table->string('birth_place')->nullable()->after('horoscope_image');
            $table->string('village')->nullable()->after('taluk');
            $table->string('pincode')->nullable()->after('village');
            $table->string('door_no')->nullable()->after('pincode');
            $table->string('land_mark')->nullable()->after('door_no');
            $table->string('permanent_address')->nullable()->after('land_mark');
            $table->string('permanent_village')->nullable()->after('permanent_address');
            $table->string('permanent_pincode')->nullable()->after('permanent_village');
            $table->string('permanent_door_no')->nullable()->after('permanent_pincode');
            $table->text('permanent_land_mark')->nullable()->after('permanent_door_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('hours');
            $table->dropColumn('mins');
            $table->dropColumn('am_pm');
            $table->dropColumn('horoscope_image');
            $table->dropColumn('birth_place');
            $table->dropColumn('village');
            $table->dropColumn('pincode');
            $table->dropColumn('door_no');
            $table->dropColumn('land_mark');
            $table->dropColumn('permanent_address');
            $table->dropColumn('permanent_village');
            $table->dropColumn('permanent_pincode');
            $table->dropColumn('permanent_door_no');
            $table->dropColumn('permanent_land_mark');
        });
    }
};

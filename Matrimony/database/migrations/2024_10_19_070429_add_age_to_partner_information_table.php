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

            $table->string('age_from')->nullable()->after('age');
            $table->string('star')->nullable()->after('caste');
            $table->string('rassi')->nullable()->after('star');
            $table->string('education')->nullable()->after('rassi');
            $table->string('dosam')->nullable()->after('education');
            $table->unsignedBigInteger('height_id_from')->after('height_id')->nullable();
            $table->foreign('height_id_from')->references('id')->on('heights');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partner_information', function (Blueprint $table) {
           $table->dropColumn('age_from');
           $table->dropColumn('star');
           $table->dropColumn('rassi');
           $table->dropColumn('education');
           $table->dropColumn('dosam');
           $table->dropForeign(['height_id_from']);
           $table->dropColumn('height_id_from');
        });
    }
};

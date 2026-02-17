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
        Schema::table('member_hobbies', function (Blueprint $table) {
           $table->string('otherhobbies')->nullable()->after('hobby_id');
           $table->string('music')->nullable()->after('otherhobbies');
           $table->string('othermusic')->nullable()->after('music');
           $table->string('sports')->nullable()->after('othermusic');
           $table->string('othersports')->nullable()->after('sports');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_hobbies', function (Blueprint $table) {

            $table->dropVolumn('otherhobbies');
            $table->dropColumn('music');
            $table->dropColumn('othermusic');
            $table->dropColumn('sports');
            $table->dropColumn('othersports');
           
        });
    }
};

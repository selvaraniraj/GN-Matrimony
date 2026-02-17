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
            $table->dropColumn('degree');
            $table->dropColumn('department');
            $table->string('college_inst')->nullable()->after('member_id');
            $table->string('employee_in')->nullable()->after('organization');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('education_details', function (Blueprint $table) {
            $table->string('degree')->nullable();
            $table->string('department')->nullable();
            $table->dropColumn('college_inst');
            $table->dropColumn('employee_in');
        });
    }
};

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
            $table->string('occuption')->nullable()->after('organization');
            $table->string('company_name')->nullable()->after('occuption');
            $table->string('destination')->nullable()->after('company_name');
            $table->text('income')->nullable()->after('destination');
            $table->string('pincode')->nullable()->after('income');
            $table->string('address')->nullable()->after('pincode');
            $table->string('passport_number')->nullable()->after('address');
            $table->string('visa_type')->nullable()->after('passport_number');
            $table->string('other_country_address')->nullable()->after('visa_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('education_details', function (Blueprint $table) {
            $table->dropColumn('occuption');
            $table->dropColumn('company_name');
            $table->dropColumn('destination');
            $table->dropColumn('income');
            $table->dropColumn('pincode');
            $table->dropColumn('address');
            $table->dropColumn('passport_number');
            $table->dropColumn('visa_type');
            $table->dropColumn('other_country_address');
        });
    }
};

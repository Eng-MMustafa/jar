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
        Schema::table('users', function (Blueprint $table) {
            $table->string('business_name')->nullable()->comment('اسم محل التأجير');
            $table->longText('business_description')->nullable()->comment('وصف محل التأجير');
            $table->string('hand_photo')->nullable()->comment('صورة الأيدي');
            $table->string('bank_account_name')->nullable()->comment('اسم صاحب الحساب البنكي');
            $table->string('bank_iban')->nullable()->comment('رقم الآيبان');
            $table->string('bank_account_number')->nullable()->comment('رقم الحساب البنكي');
            $table->enum('lender_status', ['pending', 'approved', 'rejected'])->default('pending')->nullable()->comment('حالة طلب التفعيل');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'business_name',
                'business_description',
                'hand_photo',
                'bank_account_name',
                'bank_iban',
                'bank_account_number',
                'lender_status'
            ]);
        });
    }
};

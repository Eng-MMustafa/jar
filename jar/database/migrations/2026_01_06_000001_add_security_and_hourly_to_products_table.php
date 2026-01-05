<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('security_deposit', 10, 2)->nullable()->after('price');
            $table->decimal('rental_price_hourly', 10, 2)->nullable()->after('rental_price_monthly');
            $table->string('rental_type')->nullable()->after('rental_price_hourly');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['security_deposit', 'rental_price_hourly', 'rental_type']);
        });
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('transfer_proof_path')->nullable()->after('total');
            $table->string('transfer_status')->default('not_sent')->after('transfer_proof_path');
            $table->timestamp('transfer_submitted_at')->nullable()->after('transfer_status');
            $table->text('transfer_note')->nullable()->after('transfer_submitted_at');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['transfer_proof_path', 'transfer_status', 'transfer_submitted_at', 'transfer_note']);
        });
    }
};

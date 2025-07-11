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
    Schema::table('checkout', function (Blueprint $table) {
        $table->string('metode_pembayaran')->nullable();
        $table->string('bukti_pembayaran')->nullable();
    });
}

public function down(): void
{
    Schema::table('checkout', function (Blueprint $table) {
        $table->dropColumn(['metode_pembayaran', 'bukti_pembayaran']);
    });
}
};

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
        Schema::create('checkouts', function (Blueprint $table) {
    $table->id();
    $table->string('no_resi')->nullable();
    $table->timestamp('tanggal');
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('keranjang_id')->constrained()->onDelete('cascade');
    $table->string('status')->default('menunggu_verifikasi');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};

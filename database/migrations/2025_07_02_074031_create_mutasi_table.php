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
        Schema::create('mutasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_stok');
            $table->integer('harga_satuan');
            $table->integer('qty');
            $table->enum('status', ['masuk', 'keluar']);
            $table->string('resi')->unique();
            $table->timestamps();

            // foreign key ke tabel stok
            $table->foreign('id_stok')->references('id')->on('stok')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mutasi');
    }
};
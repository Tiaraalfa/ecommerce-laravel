<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('checkouts', function (Blueprint $table) {
        $table->string('metode_pembayaran')->after('status')->nullable();
    });
}

public function down()
{
    Schema::table('checkouts', function (Blueprint $table) {
        $table->dropColumn('metode_pembayaran');
    });
}
};

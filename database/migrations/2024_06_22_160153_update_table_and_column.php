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
        Schema::table('kamar_kos', function (Blueprint $table) {
            $table->enum('status_kebersihan', ['tipe_a', 'tipe_b', 'tipe_aac', 'tipe_bac']);
        });
        Schema::table('detail_penghuni', function (Blueprint $table) {
            $table->dropColumn('status_pembayaran');
            $table->bigInteger('terbayar')->default(0);
            $table->bigInteger('saldo_laundry')->default(0);
            $table->bigInteger('dana_kebersihan')->default(0);
            $table->enum('status_kebersihan', ['tipe_a', 'tipe_b', 'tipe_aac', 'tipe_bac']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

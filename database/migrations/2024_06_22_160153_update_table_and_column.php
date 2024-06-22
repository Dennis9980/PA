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
            $table->enum('tipe', ['tipe_a', 'tipe_b', 'tipe_aac', 'tipe_bac'])->after('nomor_kamar');
        });
        Schema::table('detail_penghuni', function (Blueprint $table) {
            $table->dropColumn('status_pembayaran');
            $table->bigInteger('terbayar')->default(0)->after('phone');
            $table->bigInteger('saldo_laundry')->default(0)->after('terbayar');
            $table->bigInteger('dana_kebersihan')->default(0)->after('saldo_laundry');
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

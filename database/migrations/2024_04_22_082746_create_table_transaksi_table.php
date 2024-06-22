<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
            $table->string('nama_pembayar');
            $table->decimal('jumlah_bayar', 10, 2);
            $table->string('tujuan_bayar')->nullable();
            $table->enum('jenis_transaksi', ['laundry', 'kebersihan', 'pelunasan_kamar', 'booking']);
            $table->enum('status', ['pending', 'berhasil', 'gagal']);
            $table->date('tanggal_pembayaran');

            // Kolom khusus untuk booking (nullable)
            $table->string('no_telpon')->nullable();
            $table->string('email')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->string('tipe_kos')->nullable();
            $table->decimal('total_harga', 10, 2)->nullable();
            $table->decimal('dp', 10, 2)->nullable();

            // Kolom khusus untuk transaksi selain booking (nullable)
            $table->string('no_kamar')->nullable();

            $table->string('snap_token')->nullable();
            $table->timestamps();
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};

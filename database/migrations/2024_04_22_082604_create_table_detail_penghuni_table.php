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
        Schema::create('detail_penghuni', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
            $table->uuid('id_user');
            $table->uuid('id_kos');
            $table->uuid('id_kamar_kos');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status_pembayaran', ['belum', 'sudah']);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kos')->references('id')->on('kos');
            $table->foreign('id_kamar_kos')->references('id')->on('kamar_kos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detai_penghuni');
    }
};

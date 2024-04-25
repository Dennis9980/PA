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
        Schema::create('detai_penghuni', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
            $table->uuid('id_user');
            $table->uuid('id_kos');
            $table->uuid('id_kamar_kos');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status_pembayaran', ['belum', 'sudah']);
            $table->timestamps();
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

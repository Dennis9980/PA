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
        Schema::create('kebersihan', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
            $table->uuid('id_penghuni');
            $table->uuid('id_kamar');
            $table->bigInteger('dana_kebersihan')->default(0);
            $table->text('keterangan');
            $table->date('tanggal_kebersihan');
            $table->enum('status', ['sudah', 'belum']);
            $table->timestamps();

            $table->foreign('id_penghuni')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebersihan');
    }
};

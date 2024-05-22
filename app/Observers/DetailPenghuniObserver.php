<?php

namespace App\Observers;

use App\Models\Kos;
use App\Models\Penghuni;
use Illuminate\Validation\ValidationException;

class DetailPenghuniObserver
{
    /**
     * Handle the Penghuni "created" event.
     */
    public function creating(Penghuni $detailPenghuni)
    {
        $kos = Kos::findOrFail($detailPenghuni->id_kos);

        if ($kos->jmlh_kamar <= 0) {
            throw ValidationException::withMessages([
                'kamar_kos' => 'Kamar di kos ini sudah penuh.'
            ]);
        }

        $cekKamar = Penghuni::where('id_kos', $detailPenghuni->id_kos)
            ->where('id_kamar_kos', $detailPenghuni->id_kamar_kos)
            ->where(function ($query) use ($detailPenghuni) {
                // Hanya cek overlap jika tanggal mulai penghuni baru lebih kecil dari tanggal selesai penghuni lama
                $query->where('tanggal_selesai', '>', $detailPenghuni->tanggal_mulai)
                    ->where(function ($q) use ($detailPenghuni) {
                        $q->whereBetween('tanggal_mulai', [$detailPenghuni->tanggal_mulai, $detailPenghuni->tanggal_selesai])
                            ->orWhereBetween('tanggal_selesai', [$detailPenghuni->tanggal_mulai, $detailPenghuni->tanggal_selesai]);
                    });
            })
            ->exists();

        if ($cekKamar) {
            throw ValidationException::withMessages([
                'kamar_kos' => 'Kamar ini sudah dipesan pada tanggal tersebut.'
            ]);
        }

        $kos->decrement('jmlh_kamar');
    }

    /**
     * Handle the Penghuni "updated" event.
     */
    public function updated(Penghuni $penghuni): void
    {
        //
    }

    /**
     * Handle the Penghuni "deleted" event.
     */
    public function deleted(Penghuni $penghuni): void
    {
        $kos = $penghuni->kos; // Ambil model Kos yang terkait dengan Penghuni
        if ($kos) {
            $kos->increment('jmlh_kamar'); // Tambahkan jumlah kamar yang tersisa
        }
    }

    /**
     * Handle the Penghuni "restored" event.
     */
    public function restored(Penghuni $penghuni): void
    {
        //
    }

    /**
     * Handle the Penghuni "force deleted" event.
     */
    public function forceDeleted(Penghuni $penghuni): void
    {
        //
    }
}

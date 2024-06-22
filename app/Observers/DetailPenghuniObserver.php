<?php

namespace App\Observers;

use Carbon\Carbon;
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

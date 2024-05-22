<?php

namespace App\Providers;

use App\Models\Penghuni;
use Illuminate\Support\ServiceProvider;
use App\Observers\DetailPenghuniObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Penghuni::observe(DetailPenghuniObserver::class);
    }
}

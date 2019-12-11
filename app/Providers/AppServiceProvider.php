<?php

namespace App\Providers;

use App\Detail_invoice;
use App\Observers\Detail_invoiceObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Detail_invoice::observe(Detail_invoiceObserver::class);
    }
}

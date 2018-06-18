<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LiqPay;

class LiqpayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LiqPay::class, function ($app) {
            return new LiqPay(config('liqpay.config'));
        });
    }
}

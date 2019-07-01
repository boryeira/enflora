<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\OrderObserver;
use App\Observers\SubscriptionObserver;
use App\Models\Subscription;
use App\Models\Order;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        setlocale(LC_ALL, "es_CL.UTF-8");  
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Subscription::observe(SubscriptionObserver::class);
        Order::observe(OrderObserver::class);
    }
}

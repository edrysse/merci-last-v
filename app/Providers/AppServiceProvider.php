<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

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
    public function boot(): void
    {
        Paginator::useBootstrapFour();
        if (app()->environment(['local', 'testing'])) {
            // لا تفرض HTTPS أثناء العمل محليًا
            URL::forceScheme('http');
        } else {
            URL::forceScheme('https');
        }

    }

}

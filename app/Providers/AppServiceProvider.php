<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if ( config('app.usa_https') ) {
            $this->app['request']->server->set('HTTPS', true);
        } else {
            $this->app['request']->server->set('HTTPS', false);
        }
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ( config('app.usa_https') ) {
            $this->app['request']->server->set('HTTPS', true);
        } else {
            $this->app['request']->server->set('HTTPS', false);
        }
    }
}

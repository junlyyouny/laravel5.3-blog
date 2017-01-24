<?php

namespace App\Providers;

use App\Services\Pinyin;
use Illuminate\Support\ServiceProvider;

class PinyinServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Pinyin', function ($app) {
            return new Pinyin();
        });
    }

}

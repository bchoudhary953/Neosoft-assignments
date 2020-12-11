<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use ConsoleTVs\Charts\Registrar as Charts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\SalesChart::class
        ]);
        Schema::defaultStringLength(191);
    }    
}

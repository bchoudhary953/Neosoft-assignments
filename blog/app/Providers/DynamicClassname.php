<?php

namespace App\Providers;

use App\Models\role;
use Illuminate\Support\ServiceProvider;

class DynamicClassname extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function ($view){
            $view->with('role_array',role::all());
        });
    }
}

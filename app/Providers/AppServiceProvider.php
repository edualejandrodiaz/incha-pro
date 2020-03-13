<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Pine\BladeFilters\BladeFilters;

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
        BladeFilters::macro('price', function ($value, $param1 = true) {
            
            $currency = (($value > 1)  ? ' Puntos' : ' Punto');
            $desc = ($param1) ? $currency : '';
            
            return number_format($value, 0, ',', '.') . $desc;
        });
    }
}

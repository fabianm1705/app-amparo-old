<?php

namespace App\Providers;

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
     * Acá puedo meter cualquier variable y estará disponible en todas las vistas
     * @return void
     */
    public function boot()
    {
        //
    }
}

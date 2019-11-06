<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(120);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\ShoppingCart;
use App\Models\Profit;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     *
     * Acá puedo meter cualquier variable y estará disponible en todas las vistas
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('profits')){
          $porcCuotasDeLaCasa = Profit::find(1);
          $porccuotas = $porcCuotasDeLaCasa->percentage;
          View::share('porccuotas', $porccuotas);
          $porcCreditoUnPago = Profit::find(2);
          $porccredito = $porcCreditoUnPago->percentage;
          View::share('porccredito', $porccredito);
        }
        Schema::defaultStringLength(120);
        View::composer('*',function($view){
          $sessionName = 'shopping_cart_id';
          $shopping_cart_id = \Session::get($sessionName);
          $shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);
          \Session::put($sessionName, $shopping_cart->id);
          $view->with('productsCount', $shopping_cart->productsCount());
        });
    }
}

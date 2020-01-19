<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductsCollection;
use Config;
use MercadoPago\SDK;

class ShoppingCartController extends Controller
{
  public function __construct()
  {
    $this->middleware('shopping_cart');
  }

  public function show(Request $request)
  {
    return view('admin.product.cart',['shopping_cart' => $request->shopping_cart]);
  }

  public function iniciarProcesoCobro()
  {
    $method = new \App\MercadoPago;
    $preference = $method->setupPaymentAndGetRedirectURL();
    return view('admin.product.previaMercadoPago',['preference' => $preference]);
  }

  public function products(Request $request)
  {
    return new ProductsCollection($request->shopping_cart->products()->get());
  }

  protected function generatePaymentGateway(Request $request)
  {
      // pay de codigo facilito
      $shoppingCart = $request->shopping_cart;
      $method = new \App\MercadoPago;
      $amount = 10;

      return $method->setupPaymentAndGetRedirectURL();
  }

  public function iniciarProcesoPago(Request $request)
  {
      $allowedPaymentMethods = config('payment-methods.enabled');

      // $request->validate([
      //     'payment_method' => [
      //         'required',
      //         true,
      //     ],
      //     'terms' => 'accepted',
      // ]);
      $shoppingCart = $request->shopping_cart;
      # $order = $this->setUpOrder($preOrder, $request);
      //dd($order->id);
      $amount = $request->shopping_cart->amount();
      # $this->notify($order);
      $url = $this->generatePaymentGateway($request);
      return redirect()->to($url);
  }

}

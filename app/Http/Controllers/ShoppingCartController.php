<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductsCollection;
use Config;
use MercadoPago\SDK;
use Auth;
use Illuminate\Support\Carbon;
use App\ShoppingCart;

class ShoppingCartController extends Controller
{
  public function __construct()
  {
    $this->middleware('shopping_cart');
  }

  public function index()
  {
    $shopping_carts = ShoppingCart::orderBy('id','asc')->where('status','=',1)->get();
    return view('admin.shopping_cart.index',['shopping_carts' => $shopping_carts]);
  }

  public function show(Request $request)
  {
    return view('admin.shopping_cart.cart',['shopping_cart' => $request->shopping_cart]);
  }

  public function store(Request $request)
  {
    $request->shopping_cart->status = 1;
    $request->shopping_cart->user_id = Auth::user()->id;
    $request->shopping_cart->fecha = Carbon::now();
    $request->shopping_cart->save();

    return view('admin.shopping_cart.cartfin',['shopping_cart' => $request->shopping_cart])
          ->with('message','Compra finalizada!');
  }

  public function iniciarProcesoCobro()
  {
    $method = new \App\MercadoPago;
    $preference = $method->setupPaymentAndGetRedirectURL();
    return view('admin.shopping_cart.previaMercadoPago',['preference' => $preference]);
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

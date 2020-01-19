<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductInShoppingCart;
use App\Models\Product;
use App\Http\Resources\ProductsCollection;

class ProductInShoppingCartsController extends Controller
{
  public function __construct()
  {
    $this->middleware('shopping_cart');
  }

  public function store(Request $request)
  {
    $inShoppingCart = ProductInShoppingCart::create([
      'shopping_cart_id' => $request->shopping_cart->id,
      'product_id' => $request->product_id,
      'cantidadUnidades' => 1
    ]);
    if($inShoppingCart){
      return redirect()->back();
    }
    return redirect()->back()->withErrors('Hubo un problema');
  }

  public function products(Request $request)
  {
    return new ProductsCollection($request->shopping_cart->products()->get());
  }

  public function destroy($product_id)
  {
    $shopping_cart_id = \Session::get('shopping_cart_id');
    $productInShoppingCart = ProductInShoppingCart::where([
                ['product_id', '=', $product_id],
                ['shopping_cart_id', '=', $shopping_cart_id],
            ])->get()->first();
    $productInShoppingCart->delete();
    return redirect()->to('/carrito');
  }

}

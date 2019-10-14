<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      return view('admin.product.index',compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->hasFile('image_url')){
        $image_file=$request->file('image_url');
        $image_name=time().$image_file->getClientOriginalName();
        $image_file->move(public_path().'/images',$image_name);
      }

      $product = new Product;
      $product->modelo = $request->input('modelo');
      $product->descripcion = $request->input('descripcion');
      $product->montoCuota = $request->input('montoCuota');
      $product->cantidadCuotas = $request->input('cantidadCuotas');
      $product->vigente = $request->input('vigente');
      $product->image_url = $image_name;

      $product->save();

      return redirect()
        ->route('products.show',['product' => $product])
        ->with('message','Producto Registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      return view('admin.product.show', compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      return view('admin.product.edit', compact("product"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      $product->modelo = $request->input('modelo');
      $product->descripcion = $request->input('descripcion');
      $product->montoCuota = $request->input('montoCuota');
      $product->cantidadCuotas = $request->input('cantidadCuotas');
      $product->vigente = $request->input('vigente');
      $product->image_url = $request->input('image_url');

      $product->save();

      return redirect()
        ->route('products.edit',['product' => $product])
        ->with('message','Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();
      return redirect()
        ->route('products.index');
    }

    public function getCels(Request $request)
    {
      $image_url = config('app.url');
      $products = Product::where('vigente', 1)->where('categoria', 'Celulares')
        ->orderBy('montoCuota','asc')
        ->get();
      if($request->ajax()){
        return $products->toJson();
      }
      return view('productsList',compact("products","image_url"));
    }

    public function getElectros(Request $request)
    {
      $image_url = config('app.url');
      $products = Product::where('vigente', 1)->where('categoria', 'Electrodomésticos')
        ->orderBy('montoCuota','asc')
        ->get();
      if($request->ajax()){
        return $products->toJson();
      }
      return view('productsList',compact("products","image_url"));
    }
}

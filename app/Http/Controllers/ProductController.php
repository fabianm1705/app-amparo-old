<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:products.index')->only('index');
      $this->middleware('can:products.show')->only('show');
      $this->middleware('can:products.destroy')->only('destroy');
      $this->middleware('can:products.edit')->only(['edit','update']);
      $this->middleware('can:products.create')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::orderBy('nombre','asc')->get();
      $products = Product::all();
      return view('admin.product.index',compact("products","categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::orderBy('nombre','asc')->get();
      return view('admin.product.create', compact('categories'));
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
      $categories = Category::orderBy('nombre','asc')->get();
      return view('admin.product.show', compact("product","categories"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      $categories = Category::orderBy('nombre','asc')->get();
      return view('admin.product.edit', compact("product","categories"));
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

    public function shopping(Request $request)
    {
      $image_url = config('app.url');
      $products = Product::where('vigente', 1)
        ->orderBy('montoCuota','asc')
        ->get();
      if($request->ajax()){
        return $products->toJson();
      }
      return view('admin.product.shopping', compact("products"));
    }

    public function getCategory($id)
    {
      if($id==0){
        $products = DB::table('products')->get();
      }else{
        $products = DB::table('products')->where('category_id', '=', $id)->get();
      }
      return $products;
    }
}

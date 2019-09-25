<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Order::all()->sortByDesc('id');
      return view('admin.order.index',compact("orders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $order = new Order();
      $order->fecha = $request->input('fecha');
      $order->fechaImpresion = $request->input('fechaImpresion');
      $order->numero = $request->input('numero');
      $order->monto_s = $request->input('monto_s');
      $order->monto_a = $request->input('monto_a');
      $order->obs = $request->input('obs');
      $order->estado = $request->input('estado');
      $order->lugarEmision = $request->input('lugarEmision');
      $order->pacient_id = $request->input('pacient_id');
      $order->doctor_id = $request->input('doctor_id');

      $order->save();

      return redirect()
        ->route('orders.show',['order' => $order])
        ->with('message','Orden Registrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
      return view('admin.order.show', compact("order"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
      return view('admin.order.edit', compact("order"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
      $order->fecha = $request->input('fecha');
      $order->fechaImpresion = $request->input('fechaImpresion');
      $order->numero = $request->input('numero');
      $order->monto_s = $request->input('monto_s');
      $order->monto_a = $request->input('monto_a');
      $order->obs = $request->input('obs');
      $order->estado = $request->input('estado');
      $order->lugarEmision = $request->input('lugarEmision');
      $order->pacient_id = $request->input('pacient_id');
      $order->doctor_id = $request->input('doctor_id');

      $order->save();

      return redirect()
        ->route('orders.edit',['order' => $order])
        ->with('message','Orden Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
      $order->delete();
      return redirect()
        ->route('orders.index');
    }
}

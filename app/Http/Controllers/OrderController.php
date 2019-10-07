<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Doctor;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

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
      $order->fecha = Carbon::now();
      $order->fechaImpresion = Carbon::now();
      $doctor = Doctor::find($request->input('doctor_id'));
      $order->monto_s = $doctor->specialty->monto_s;
      $order->monto_a = $doctor->specialty->monto_a;
      $order->obs = "";
      $order->estado = "Impresa";
      $order->lugarEmision = "Sede Amparo";
      $order->pacient_id = $request->input('pacient_id');
      $order->doctor_id = $request->input('doctor_id');

      $order->save();

      return redirect()
        ->route('getOrders')
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

    public function getOrders(Request $request)
    {
      $user_id = Auth::user()->id;
      $group_id = Auth::user()->group_id;
      $users = User::where('group_id',$group_id)->get();
      $orders = Order::where('pacient_id',$user_id)->get();
      return view('orders',compact("orders","users"));
    }
}

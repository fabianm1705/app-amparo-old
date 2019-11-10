<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Doctor;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
      $this->middleware('can:orders.index')->only('index');
      $this->middleware('can:orders.show')->only('show');
      $this->middleware('can:orders.destroy')->only('destroy');
      $this->middleware('can:orders.edit')->only(['edit','update']);
      $this->middleware('can:orders.create')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Order::orderBy('fecha', 'desc')->take(60)->paginate(15);
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
      $order->monto_s = $request->input('monto_s');
      $order->monto_a = $request->input('monto_a');
      $order->obs = $request->input('obs');;
      $order->estado = $request->input('estado');
      $order->lugarEmision = $request->input('lugarEmision');
      $order->pacient_id = $request->input('pacient_id');
      $order->doctor_id = $request->input('doctor_id');

      $order->save();

      // return redirect()
      //   ->route('pdf',['id' => $order->id])
      //   ->with('message','Orden Registrada');
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

    public function crear(Request $request)
    {
      $group_id = Auth::user()->group_id;
      //Tomar los Id de todos los usuarios del grupo
      $usersId = User::where('group_id',$group_id)->pluck('id')->toArray();
      //Para buscar las órdenes de todos
      $orders = Order::whereIn('pacient_id',$usersId)->orderBy('fecha', 'desc')->paginate(4);

      return view('admin.order.crear',compact("orders"));
    }

    public function getOnlyOrders($id)
    {
      $orders = Order::with('doctor')
          ->where('pacient_id', '=', $id)
          ->get();
      return $orders;
    }

    public function getOnlyUsers(Request $request)
    {
      $group_id = Auth::user()->group_id;
      $users = User::where('group_id',$group_id)->get();
      if($request->ajax()){
        return $users->toJson();
      }
      return $users;
    }

    public function getOnlyUsersAdmin($name,$nroDoc = "")
    {
      $users = User::with('group')
          ->orderBy('name','desc')
          ->name($name)
          ->nroDoc($nroDoc)
          ->get();
      return $users;
    }

    public function getOnlyUsersNroDocAdmin($nroDoc)
    {
      $users = User::with('group')
          ->orderBy('name','desc')
          ->nroDoc($nroDoc)
          ->get();
      return $users;
    }

    public function cantOrders($id)
    {
      $cantOrders = DB::table('orders')
                     ->select(DB::raw('count(*) as order_count'))
                     ->where('pacient_id', '=', $id)
                     ->whereMonth('fecha','=',now()->month)
                     ->whereYear('fecha','=',now()->year)
                     ->get();
      return $cantOrders->pluck('order_count');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Layer;
use App\UserInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class LayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layer  $layer
     * @return \Illuminate\Http\Response
     */
    public function show(Layer $layer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layer  $layer
     * @return \Illuminate\Http\Response
     */
    public function edit(Layer $layer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layer  $layer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layer $layer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layer  $layer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layer $layer)
    {
        //
    }

    public function getLayers($id)
    {
      $layers = DB::table('layers')->where('user_id', '=', $id)->get();
      return $layers;
    }

    public function activarSalud()
    {
      if((Auth::user()->group->nroSocio<>'1232') and (Auth::user()->group->nroSocio<>'1231')){
        UserInterest::create([
          'user_id' => Auth::user()->id,
          'interest_id' => 11,
          'obs' => 'Plan Salud Individual'
        ]);
      }

      Layer::create([
                    'nombre' => 'Amparo Salud',
                    'monto' => 500,
                    'user_id' => Auth::user()->id,
                    'subscription_id' => 6
                  ]);
      return redirect()
        ->route('home')->with('message','Plan habilitado! Ya puedes emitir órdenes médicas de consulta.');
    }

    public function activarOdontologia()
    {
      if((Auth::user()->group->nroSocio<>'1232') and (Auth::user()->group->nroSocio<>'1231')){
        UserInterest::create([
          'user_id' => Auth::user()->id,
          'interest_id' => 11,
          'obs' => 'Plan Odontológico'
        ]);
      }

      Layer::create([
                    'nombre' => 'Amparo Odontológico',
                    'monto' => 200,
                    'user_id' => Auth::user()->id,
                    'subscription_id' => 9
                  ]);
      return redirect()
        ->route('home')->with('message','Plan habilitado! Llamanos o escribenos a la oficina para comenzar a utilizarlo.');
    }
}

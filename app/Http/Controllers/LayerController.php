<?php

namespace App\Http\Controllers;

use App\Models\Layer;
use Illuminate\Http\Request;

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
      $id = Auth::user()->id;

      $layers = DB::table('layers')->where('user_id', '=', $id)->get();
      return $layers;
    }
}

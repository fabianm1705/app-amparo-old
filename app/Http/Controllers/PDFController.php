<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
use PDF;

class PDFController extends Controller
{
    public function invoice()
      {
        $orden = $this->getData();
        foreach ($orden as $order)
        {
          $view =  \View::make('admin.order.show', compact('order'))->render();
          $pdf = \App::make('dompdf.wrapper');
          $pdf->loadHTML($view);
        }
        return $pdf->stream('invoice');
      }

    public function getData()
      {
        // $user_id = Auth::user()->id; Order::where('id',$id)->get();
        $order = DB::table('orders')
                ->latest()
                ->first();
        return $order;
      }

}

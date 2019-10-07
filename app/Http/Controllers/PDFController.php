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
        $user_id = Auth::user()->id;
        $order = Order::where('pacient_id',$user_id)->latest()->first();
        $data = $this->getData();
        // dd($order);
        $view =  \View::make('admin.order.show', compact('order'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
      }

    public function getData()
      {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
      }

}

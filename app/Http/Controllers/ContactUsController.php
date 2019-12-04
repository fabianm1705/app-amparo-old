<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Mail;

class ContactUsController extends Controller
{

 public function contactUs()
 {
     return view('contactUs');
 }

  public function contactUsPost(Request $request)
  {
      $this->validate($request, [
         'name' => 'required',
         'message' => 'required'
       ]);

      Mail::send('email', array(
              'name' => $request->get('name'),
              'address' => $request->get('address'),
              'telephone' => $request->get('telephone'),
              'email' => $request->get('email'),
              'user_message' => $request->get('message')
           ), function($message){
                $message->from('noreply@amparosrl.com.ar');
                $message->to('amparoserviciossociales@gmail.com', 'Admin')
              ->subject('Socio: Alguien ha enviado un mensaje');
      });
      return redirect('home')->with('message', 'Gracias por el mensaje! Nos contactaremos a la brevedad.');
  }

  public function contactUsWelcome(Request $request)
  {
      $this->validate($request, [
         'name' => 'required',
         'message' => 'required'
       ]);

      Mail::send('email', array(
              'name' => $request->get('name'),
              'address' => $request->get('address'),
              'telephone' => $request->get('telephone'),
              'email' => $request->get('email'),
              'user_message' => $request->get('message')
           ), function($message){
                $message->from('noreply@amparosrl.com.ar');
                $message->to('amparoserviciossociales@gmail.com', 'Admin')
              ->subject('Visitante: Alguien ha enviado un mensaje');
      });
      return back()->with('message', 'Gracias por el mensaje! Nos contactaremos a la brevedad.');
  }

}

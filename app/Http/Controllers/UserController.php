<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getOnlyUsers(Request $request)
    {
      $name = $request->input('name');
      $nroDoc = $request->input('nroDoc');
      $users = User::orderBy('name','desc')
          ->name($name)
          ->nroDoc($nroDoc)
          ->get();
      return $users;
    }

}

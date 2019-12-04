<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('can:users.index')->only('index');
    $this->middleware('can:users.show')->only('show');
    $this->middleware('can:users.destroy')->only('destroy');
    $this->middleware('can:users.edit')->only(['edit','update']);
  }

  public function index()
  {
    $users = User::paginate();
    return view('admin.user.index',compact("users"));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    $roles = Role::get();
    return view('admin.user.show', compact("user","roles"));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    $roles = Role::get();
    return view('admin.user.edit', compact("user","roles"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    $user->update($request->all());

    $user->roles()->sync($request->input('roles'));

    return redirect()
      ->route('users.edit',['user' => $user])
      ->with('message','Socio Actualizado');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    $user->delete();

    return redirect()
      ->route('users.index');
  }

  public function getUsers(Request $request)
  {
    $users = User::orderBy('name','desc')
        ->name($request->input('name'))
        ->nroDoc($request->input('nroDoc'))
        ->get();

    return view('admin.order.search', compact("users"));
  }

  public function editPassword()
  {
    return view('auth.passwords.change');
  }

  public function change(ChangePasswordRequest $request)
  {
    $user = Auth::user();
    $password = Hash::make($request->input('password'));
    $user->password = $password;
    $user->password_changed_at = Carbon::now();
    $user->save();

    return redirect()
      ->route('home')
      ->with('message','Contraseña Modificada!');
  }

  public function restablecerPassword(User $user)
  {
    $year = 0;
    $month = 0;
    $day = 0;
    $tz = 'Europe/Madrid';
    $user->password = Hash::make('amparo');
    $user->password_changed_at = Carbon::createFromDate($year, $month, $day, $tz);
    $user->save();

    return redirect()
      ->route('users')
      ->with('message','Contraseña Restablecida!');
  }
}
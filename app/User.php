<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nroDoc','nroAdh','tipoDoc','sexo',
        'fechaNac','activo','vigenteOrden','group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group()
    {
      return $this->belongsTo('App\Models\Group');
    }

    public function orders()
    {
      return $this->hasMany('App\Models\Order','pacient_id');
    }

    public function layers()
    {
      return $this->hasMany('App\Models\Layer','user_id');
    }

    public function scopeName($query, $name)
    {
      if($name)
          return $query->where('name','LIKE',"%$name%");
    }

    public function scopeNroDoc($query, $nroDoc)
    {
      if($nroDoc)
          return $query->where('nroDoc','LIKE',"%$nroDoc%");
    }
}

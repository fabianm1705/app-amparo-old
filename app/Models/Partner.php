<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nroAdh', 'apeynom', 'tipoDoc', 'nroDoc', 'sexo', 'fechaNac',
      'activo', 'vigenteOrden', 'group_id',
  ];

  public function group()
  {
    return $this->belongsTo('App\Models\Group');
  }

  public function orders()
  {
    return $this->hasMany('App\Models\Order','pacient_id');
  }
}

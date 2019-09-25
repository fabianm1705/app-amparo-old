<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nroAdh', 'nombre', 'monto', 'group_id',
  ];

  public function group()
  {
    return $this->belongsTo('App\Models\Group');
  }
  
}

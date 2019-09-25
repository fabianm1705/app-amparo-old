<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'fecha', 'fechaImpresion', 'numero', 'monto_s', 'monto_a',
    'obs', 'estado', 'lugarEmision', 'pacient_id', 'doctor_id',
  ];

  protected $casts = [
    'fecha' => 'date:Y-m-d',
    'fechaImpresion' => 'date:Y-m-d',
  ];

  public function partner()
  {
    return $this->belongsTo('App\Models\Partner','pacient_id');
  }

  public function doctor()
  {
    return $this->belongsTo('App\Models\Doctor');
  }

}

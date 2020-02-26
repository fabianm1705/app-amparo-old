<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
  protected $fillable = [
      'description', 'grupal', 'sepelio_estandar','sepelio_plus','salud',
      'odontologia','orden_medica',
  ];

  public function users()
  {
    return $this->belongsToMany('App\User','layers');
  }

  public function plans()
  {
    return $this->hasMany('App\Models\Plan','subscription_id');
  }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Layer;
use App\User;

class LayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $lineas = file('storage/app/public/iplanes.txt');
      foreach ($lineas as $linea)
      {
        $datos = explode("|", $linea);
        $layer = new Layer();
        $layer->nombre = utf8_encode(trim($datos[2]));
        $layer->monto = intval(trim($datos[3]));

        $user = User::where('name', '=', utf8_encode(trim($datos[4])))
                                  ->get()->first();
        if ($user != null) {
          $layer->user_id=$user->id;
        }

        $layer->save();
      }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Plan;
use App\Models\Group;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $lineas = file('storage/app/public/planes.txt');
      foreach ($lineas as $linea)
      {
        $datos = explode("|", $linea);
        $plan = new Plan();
        $plan->nombre = utf8_encode(trim($datos[1]));
        $plan->monto = intval(trim($datos[2]));
        $plan->emiteOrden = intval(trim($datos[3]));

        $group = Group::where('nroSocio', '=', utf8_encode(trim($datos[0])))
                                  ->get()->first();
        if ($group != null) {
          $plan->group_id=$group->id;
        }

        $plan->save();
      }
    }
}

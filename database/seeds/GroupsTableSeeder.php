<?php

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $lineas = file('storage/app/public/grupos.txt');
      foreach ($lineas as $linea)
      {
        $datos = explode("|", $linea);
        $group = new Group();
        $group->nroSocio = utf8_encode(trim($datos[0]));
        $group->fechaAlta = utf8_encode(trim($datos[1]));
        $group->email=utf8_encode(trim($datos[2]));
        $group->telefono=utf8_encode(trim($datos[3]));
        $group->direccion = utf8_encode(trim($datos[4]));
        $group->direccionCobro = utf8_encode(trim($datos[5]));
        $group->diaCobro = utf8_encode(trim($datos[6]));
        $group->horaCobro = utf8_encode(trim($datos[7]));
        $group->total = intval(trim($datos[8]));
        $group->activo=1;
        $group->save();
      }
    }
}

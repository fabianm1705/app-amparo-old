<?php

use Illuminate\Database\Seeder;
use \App\User;
use Illuminate\Support\Facades\Storage;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $lineas = file('storage/app/public/socios.txt');
        foreach ($lineas as $linea)
        {
          $datos = explode("|", $linea);
          $user->nroAdh = utf8_encode(trim($datos[0]));
          $user->name = utf8_encode(trim($datos[1]));
          $user->password = "amparo";
          $user->nroDoc = utf8_encode(trim($datos[2]));
          $user->tipoDoc=1;
          $time = strtotime($datos[3]);
          $user->fechaNac = date('Y-m-d',$time);
          $user->sexo=utf8_encode(trim($datos[4]));
          $user->vigenteOrden=intval(trim($datos[5]));
          $user->activo=intval(trim($datos[6]));

          $user->save();
        }
    }

}

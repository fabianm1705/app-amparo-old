<?php

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $lineas = file('storage/app/public/doctores.txt');
      foreach ($lineas as $linea)
      {
        $datos = explode("|", $linea);
        $doctor = new Doctor();
        $doctor->apeynom = Str::title(utf8_encode(trim($datos[0])));
        $doctor->direccion = Str::title(utf8_encode(trim($datos[1])));
        $doctor->telefono = utf8_encode(trim($datos[2]));
        $doctor->email=utf8_encode(trim($datos[3]));
        $doctor->vigente=1;
        $doctor->coseguroConsultorio=0;

        $specialty = Specialty::where('descripcion', '=', utf8_encode(trim($datos[4])))
                                  ->get()->first();
        $doctor->specialty_id=$specialty->id;

        $doctor->save();
      }
    }
}

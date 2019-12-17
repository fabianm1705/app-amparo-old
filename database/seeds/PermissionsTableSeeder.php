<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
          'name' => 'Farmacia Nueva Farma',
          'slug' => 'Farmacia',
          'description' => 'Acceso Padrón Farmacia'
        ]);
        Permission::create([
          'name' => 'Padrón SOS Emergencias',
          'slug' => 'sos.emergencias',
          'description' => 'Padrón SOS Emergencias'
        ]);

    }
}

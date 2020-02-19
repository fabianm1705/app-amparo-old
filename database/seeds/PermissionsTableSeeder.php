<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use App\Models\PaymentMethod;

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
          'name' => 'Ver Zonas de Interés',
          'slug' => 'interests.show',
          'description' => 'Ver en detalle cada zona de interés'
        ]);
        Permission::create([
          'name' => 'Navegar Zonas de Interés',
          'slug' => 'interests.index',
          'description' => 'Navega todas las zonas de interés'
        ]);
        Permission::create([
          'name' => 'Crear Zona de Interés',
          'slug' => 'interests.create',
          'description' => 'Crear una zona de interés'
        ]);
        Permission::create([
          'name' => 'Editar Zonas de Interés',
          'slug' => 'interests.edit',
          'description' => 'Editar el detalle de cada zona de interés'
        ]);
        Permission::create([
          'name' => 'Eliminar Zonas de Interés',
          'slug' => 'interests.destroy',
          'description' => 'Eliminar una zona de interés'
        ]);
    }
}

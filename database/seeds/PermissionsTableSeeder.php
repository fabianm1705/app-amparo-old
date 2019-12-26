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
          'name' => 'Navegar Métodos de Pago',
          'slug' => 'payment_methods.index',
          'description' => 'Navega todos los métodos de pago'
        ]);
        Permission::create([
          'name' => 'Editar Métodos de Pago',
          'slug' => 'payment_methods.edit',
          'description' => 'Editar un método de pago'
        ]);
        Permission::create([
          'name' => 'Eliminar Métodos de Pago',
          'slug' => 'payment_methods.destroy',
          'description' => 'Eliminar un método de pago'
        ]);

    }
}

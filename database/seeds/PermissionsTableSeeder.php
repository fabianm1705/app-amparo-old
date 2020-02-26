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
          'name' => 'Ver Plans/Subscriptions',
          'slug' => 'subscriptions.show',
          'description' => 'Ver en detalle cada plan/subscription'
        ]);
        Permission::create([
          'name' => 'Navegar Plans/Subscriptions',
          'slug' => 'subscriptions.index',
          'description' => 'Navega todos los plans/subscriptions'
        ]);
        Permission::create([
          'name' => 'Crear Plans/Subscriptions',
          'slug' => 'subscriptions.create',
          'description' => 'Crear un plan/subscription'
        ]);
        Permission::create([
          'name' => 'Editar Plans/Subscriptions',
          'slug' => 'subscriptions.edit',
          'description' => 'Editar el detalle de cada plan/subscription'
        ]);
        Permission::create([
          'name' => 'Eliminar Plans/Subscriptions',
          'slug' => 'subscriptions.destroy',
          'description' => 'Eliminar un plan/subscription'
        ]);
    }
}

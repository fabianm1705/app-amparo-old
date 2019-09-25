<?php

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Plan::Class)->times(800)->create();
    }
}

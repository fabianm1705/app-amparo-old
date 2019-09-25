<?php

use Illuminate\Database\Seeder;
use App\Models\Sale;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sale::Class)->times(700)->create();
    }
}

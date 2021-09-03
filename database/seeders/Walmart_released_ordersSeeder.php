<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Walmart_released_ordersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\walmart_released_orders::factory(50)->create();
    }
}

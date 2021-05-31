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
        Plan::create([
            'name' => 'Plano Gold',
            'url' => 'plano_gold',
            'price' => 299.90,
            'description' => 'Plano Amarelo Gold',
        ]);
    }
}

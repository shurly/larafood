<?php

use Illuminate\Database\Seeder;
use App\Models\Tenant;
use App\Models\Plan;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => 23156489787,
            'name' => 'Burger King',
            'url' => 'burger_king',
            'email' => 'burgerking@gmail.com',
        ]);
    }
}

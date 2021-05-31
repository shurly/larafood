<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tenant;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();
        $tenant->users()->create([
           'name' => 'Maria Almeida',
           'email' => 'mariazinha@gmail.com',
           'password' => bcrypt('123456')
        ]);
    }
}

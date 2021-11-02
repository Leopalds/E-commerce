<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::updateOrCreate([
            'tipo' => 1,
            'nome' => 'admin'
        ]);

        $user = Role::updateOrCreate([
            'tipo' => 2,
            'nome' => 'user'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'ADMINISTRATOR',
            'USER',
            'LESSOR', //Arrendador-dueño
            'LESSEE', //Arrendatario-inquilino
            'CO-TENANT' //coarrendatario
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}

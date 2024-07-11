<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call to roles seeder
        $this->call(RolesTableSeeder::class);

        // Create first user and assign admin role
        $user = User::factory()->create([
            'name' => 'Admin User',
            'role_id' => 1,
            'email' => 'afmurillo97@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'status' => '1',
            'remember_token' => Str::random(10),
        ]);

        // Assign role to user
        $user->assignRole('ADMINISTRATOR');
    }
}

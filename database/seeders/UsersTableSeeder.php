<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Creamos 5 usuarios de ejemplo
        User::factory()->count(5)->create();

        // Opcional: un usuario admin fijo
        User::create([
            'username' => 'admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);
    }
}

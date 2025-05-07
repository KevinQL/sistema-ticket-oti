<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Técnicos
        User::create([
            'name' => 'Técnico 1',
            'email' => 'tecnico1@example.com',
            'password' => Hash::make('password'),
            'role' => 'technician'
        ]);

        User::create([
            'name' => 'Técnico 2',
            'email' => 'tecnico2@example.com',
            'password' => Hash::make('password'),
            'role' => 'technician'
        ]);

        // Usuarios regulares
        User::create([
            'name' => 'Usuario Regular',
            'email' => 'usuario@example.com',
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);
    }
}

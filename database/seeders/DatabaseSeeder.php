<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Admin',     'email' => 'admin@neumaticos.local', 'password' => 'Admin123!', 'role' => 'admin'],
            ['name' => 'Usuario SLW', 'email' => 'slw@neumaticos.local', 'password' => 'Slw123!',   'role' => 'slw'],
            ['name' => 'Usuario QET', 'email' => 'qet@neumaticos.local', 'password' => 'Qet123!',   'role' => 'qet'],
            ['name' => 'Usuario BUTC', 'email' => 'butc@neumaticos.local', 'password' => 'Butc123!', 'role' => 'butc'],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name'     => $userData['name'],
                    'password' => Hash::make($userData['password']),
                    'role'     => $userData['role'],
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nome' => 'Admin',
            'email' => 'admin@example.com',
            'senha' => bcrypt('password'),
            'tipo' => 'admin',
        ]);

        User::create([
            'nome' => 'Operador',
            'email' => 'operador@example.com',
            'senha' => bcrypt('password'),
            'tipo' => 'operador',
        ]);
    }
}

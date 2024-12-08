<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Exemplo de seeding de um usuário
        User::create([
            'nome' => 'Test User',  // Alterado de 'name' para 'nome'
            'email' => 'test@example.com',
            'password' => bcrypt('password'),  // Não se esqueça de usar bcrypt para a senha
        ]);
    }
}


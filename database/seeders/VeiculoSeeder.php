<?php

namespace Database\Seeders;

use App\Models\Veiculo;
use Illuminate\Database\Seeder;

class VeiculoSeeder extends Seeder
{
    public function run()
    {
        Veiculo::create([
            'nome' => 'Fiat Uno',
            'marca' => 'Fiat',
            'modelo' => 'Uno 1.0',
            'ano' => 2020,
            'categoria' => 'carro',
            'valor_diaria' => 150.00,
            'status' => 'disponivel',
        ]);

        Veiculo::create([
            'nome' => 'Yamaha YBR',
            'marca' => 'Yamaha',
            'modelo' => 'YBR 125',
            'ano' => 2018,
            'categoria' => 'moto',
            'valor_diaria' => 80.00,
            'status' => 'disponivel',
        ]);
    }
}

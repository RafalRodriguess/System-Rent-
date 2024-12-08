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

        Veiculo::create([
            'nome' => 'Chevrolet Onix',
            'marca' => 'Chevrolet',
            'modelo' => 'Onix 1.0',
            'ano' => 2021,
            'categoria' => 'carro',
            'valor_diaria' => 180.00,
            'status' => 'alugado',
        ]);

        Veiculo::create([
            'nome' => 'Honda Civic',
            'marca' => 'Honda',
            'modelo' => 'Civic EXL',
            'ano' => 2020,
            'categoria' => 'carro',
            'valor_diaria' => 250.00,
            'status' => 'manutencao',
        ]);

        Veiculo::create([
            'nome' => 'Suzuki GSX-R',
            'marca' => 'Suzuki',
            'modelo' => 'GSX-R 1000',
            'ano' => 2019,
            'categoria' => 'moto',
            'valor_diaria' => 200.00,
            'status' => 'disponivel',
        ]);

        Veiculo::create([
            'nome' => 'Toyota Corolla',
            'marca' => 'Toyota',
            'modelo' => 'Corolla 2.0',
            'ano' => 2022,
            'categoria' => 'carro',
            'valor_diaria' => 220.00,
            'status' => 'disponivel',
        ]);

        Veiculo::create([
            'nome' => 'Honda CB 500',
            'marca' => 'Honda',
            'modelo' => 'CB 500X',
            'ano' => 2021,
            'categoria' => 'moto',
            'valor_diaria' => 120.00,
            'status' => 'disponivel',
        ]);

        Veiculo::create([
            'nome' => 'Ford Fiesta',
            'marca' => 'Ford',
            'modelo' => 'Fiesta 1.6',
            'ano' => 2019,
            'categoria' => 'carro',
            'valor_diaria' => 160.00,
            'status' => 'alugado',
        ]);

        Veiculo::create([
            'nome' => 'Kawasaki Ninja',
            'marca' => 'Kawasaki',
            'modelo' => 'Ninja 650',
            'ano' => 2021,
            'categoria' => 'moto',
            'valor_diaria' => 140.00,
            'status' => 'manutencao',
        ]);

        Veiculo::create([
            'nome' => 'Hyundai HB20',
            'marca' => 'Hyundai',
            'modelo' => 'HB20 1.0',
            'ano' => 2020,
            'categoria' => 'carro',
            'valor_diaria' => 170.00,
            'status' => 'disponivel',
        ]);

        Veiculo::create([
            'nome' => 'BMW R 1200 GS',
            'marca' => 'BMW',
            'modelo' => 'R 1200 GS',
            'ano' => 2018,
            'categoria' => 'moto',
            'valor_diaria' => 250.00,
            'status' => 'disponivel',
        ]);

        Veiculo::create([
            'nome' => 'Chevrolet Spin',
            'marca' => 'Chevrolet',
            'modelo' => 'Spin LTZ',
            'ano' => 2021,
            'categoria' => 'carro',
            'valor_diaria' => 200.00,
            'status' => 'alugado',
        ]);

        Veiculo::create([
            'nome' => 'Harley-Davidson Sportster',
            'marca' => 'Harley-Davidson',
            'modelo' => 'Sportster Iron 883',
            'ano' => 2020,
            'categoria' => 'moto',
            'valor_diaria' => 180.00,
            'status' => 'manutencao',
        ]);

        Veiculo::create([
            'nome' => 'Ford Mustang',
            'marca' => 'Ford',
            'modelo' => 'Mustang GT',
            'ano' => 2021,
            'categoria' => 'carro',
            'valor_diaria' => 350.00,
            'status' => 'disponivel',
        ]);

        Veiculo::create([
            'nome' => 'KTM Duke 390',
            'marca' => 'KTM',
            'modelo' => 'Duke 390',
            'ano' => 2020,
            'categoria' => 'moto',
            'valor_diaria' => 160.00,
            'status' => 'disponivel',
        ]);

        Veiculo::create([
            'nome' => 'Mercedes-Benz C-Class',
            'marca' => 'Mercedes-Benz',
            'modelo' => 'C-Class Sedan',
            'ano' => 2020,
            'categoria' => 'carro',
            'valor_diaria' => 280.00,
            'status' => 'disponivel',
        ]);

        Veiculo::create([
            'nome' => 'Ducati Monster 1200',
            'marca' => 'Ducati',
            'modelo' => 'Monster 1200',
            'ano' => 2019,
            'categoria' => 'moto',
            'valor_diaria' => 220.00,
            'status' => 'alugado',
        ]);

        Veiculo::create([
            'nome' => 'Chevrolet Tracker',
            'marca' => 'Chevrolet',
            'modelo' => 'Tracker Premier',
            'ano' => 2021,
            'categoria' => 'carro',
            'valor_diaria' => 210.00,
            'status' => 'manutencao',
        ]);
    }
}

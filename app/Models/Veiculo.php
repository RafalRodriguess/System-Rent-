<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'marca', 'modelo', 'ano', 'categoria',
        'valor_diaria', 'status','imagem', 'ar_condicionado', 'combustivel',
        'portas', 'assentos','caucao' ];

    public function alugueis()
    {
        return $this->hasMany(Aluguel::class);
    }

}


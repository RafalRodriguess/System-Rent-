<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'veiculo_id', 'data_inicio', 'data_fim', 'status', 'valor_total'];
    protected $table = 'alugueis';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}

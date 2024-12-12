<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Adicione esta linha
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Authenticatable // Altere de Model para Authenticatable
{
    use HasFactory, Notifiable; // Mantenha a trait HasFactory e Notifiable

    protected $fillable = [
        'nome', 'email', 'senha', 'telefone', 'data_nascimento', 'cpf', 'rg', 'endereco', 'cidade', 'estado', 'status',
    ];

    // Adicione qualquer outro método necessário para autenticação, como hidden (para senha)
    protected $hidden = [
        'senha',
    ];

    // Se necessário, pode adicionar mais métodos, por exemplo, para verificar se o cliente está ativo, etc.
}


<?php

namespace App\Http\Controllers;

use App\Models\Reserva; // Seu modelo de reserva
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function show($id)
    {
        // Buscando a reserva pelo ID
        $reserva = Reserva::findOrFail($id);

        // Passando os dados para a view
        return view('reserva.show', compact('reserva'));
    }
}

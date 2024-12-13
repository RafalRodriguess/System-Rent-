<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('clientes.index', compact('clientes'));
    }
    public function show($id)
    {
        try {
            $cliente = Cliente::with(['alugueis'])->findOrFail($id);
            return view('clientes.show', compact('cliente'));
        } catch (\Exception $e) {
            \Log::error('Erro ao exibir os detalhes do cliente: ' . $e->getMessage());
            return redirect()->route('clientes.index')->withErrors(['error' => 'Cliente não encontrado.']);
        }
    }
    
    

}

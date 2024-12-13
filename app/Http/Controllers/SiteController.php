<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluguel;
use Carbon\Carbon;
class SiteController extends Controller
{
    public function index()
    {
        
        $alugueis = Aluguel::all();
        $clientes = Cliente::all();
        $veiculos = Veiculo::all();
        $veiculo = null; 

        return view('site.site', compact('alugueis', 'clientes', 'veiculos'));
    }

    public function viewlogin()
    {
        return view('site.login');
    }

    public function viewregister()
    {
        return view('site.register');
    }

    public function cadastro(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|string|min:8|confirmed',
        ]);

        try {
            $clientes = Cliente::create([
                'nome' => $request->nome,
                'email' => $request->email,
                'senha' => bcrypt($request->senha),
                'status' => 'ativo',
            ]);

           
            return redirect()->route('site.site')->with('success', 'Cadastro realizado com sucesso!');
        } catch (\Exception $e) {
           
            return back()->withErrors(['error' => 'Houve um erro ao criar o cliente.']);
        }
    }

    public function login(Request $request)
    {
        // Validação dos campos de entrada
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);


        // Verificar se existe um cliente com o email fornecido
        $clientes = Cliente::where('email', $credentials['email'])->first();

        if ($clientes && Hash::check($credentials['senha'], $clientes->senha)) {
            // Se as credenciais estiverem corretas, realiza o login
            Auth::guard('clientes')->login($clientes); // Usando o guard 'clientes'
            $request->session()->regenerate(); // Regenera a sessão para segurança

            // Redireciona para a página desejada após login
            return redirect()->route('site.site'); // Exemplo: redireciona para a página de aluguel
        }

        // Se não encontrar o cliente ou a senha estiver incorreta, retorna um erro
        Log::warning("Credenciais inválidas para o email: " . $credentials['email']);
        return back()->withErrors(['senha' => 'Credenciais inválidas.']);
    }

    public function sair(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('site.site');
    }

    public function Adminshow($id)
    {
        try {
            $cliente = Cliente::with('alugueis', 'veiculos')->findOrFail($id);
    
            return view('clientes.show', compact('cliente'));
        } catch (\Exception $e) {
            \Log::error('Erro ao exibir os detalhes do cliente: ' . $e->getMessage());
            return redirect()->route('clientes.index')->withErrors(['error' => 'Cliente não encontrado.']);
        }
    }
    
}

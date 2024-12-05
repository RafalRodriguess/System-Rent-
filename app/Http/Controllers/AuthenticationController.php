<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function signIn()
    {
        return view('authentication.signin');
    }

    public function signUp()
    {
        return view('authentication.signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = User::create([
                'nome' => $request->nome,
                'email' => $request->email,
                'senha' => bcrypt($request->senha),
                'type' => 'admin',
                'status' => true,
            ]);

            Log::info("Usuário criado com sucesso.", ['user' => $user]);

            return redirect()->route('signin')->with('success', 'Cadastro realizado com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao criar usuário.', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Houve um erro ao criar o usuário.']);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        Log::info("Tentando fazer login com email: " . $credentials['email']);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['senha'], $user->senha)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('dashboard/index');
        }

        Log::warning("Credenciais inválidas para o email: " . $credentials['email']);
        return back()->withErrors(['senha' => 'Credenciais inválidas.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('signin');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(10);
        return view('users.index', compact('usuarios'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|string|min:6|confirmed',
            'type' => 'required|in:admin,operador',
            'status' => 'required|boolean',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $profileImagePath = $request->hasFile('profile_image')
            ? $request->file('profile_image')->store('profile_images', 'public')
            : null;

        try {
            User::create([
                'nome' => $validated['nome'],
                'email' => $validated['email'],
                'senha' => bcrypt($validated['senha']),
                'type' => $validated['type'],
                'status' => $validated['status'],
                'profile_image' => $profileImagePath,
            ]);

            return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao criar o usuário.', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Houve um erro ao criar o usuário.']);
        }
    }

    public function show($id)
    {
        Log::info("Exibindo os detalhes do usuário com ID: $id.");
        $usuario = User::findOrFail($id);
        return view('users.show', compact('usuario'));
    }

    public function edit($id)
    {
        Log::info("Abrindo o formulário de edição para o usuário com ID: $id.");
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        Log::info("Iniciando a atualização do usuário ID: $id.");

        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$id}",
            'senha' => 'nullable|string|min:6',
            'tipo' => 'required|in:admin,operador',
            'status' => 'required|boolean',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $profileImagePath = $user->profile_image;

        if ($request->hasFile('profile_image')) {
            Log::info('Nova imagem de perfil recebida.');

            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
                Log::info('Imagem antiga excluída.');
            }

            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            Log::info('Nova imagem de perfil armazenada.', ['image_path' => $profileImagePath]);
        }

        $user->update([
            'nome' => $validated['nome'],
            'email' => $validated['email'],
            'senha' => $validated['senha'] ? bcrypt($validated['senha']) : $user->senha,
            'tipo' => $validated['tipo'],
            'status' => $validated['status'],
            'profile_image' => $profileImagePath,
        ]);

        Log::info('Usuário atualizado com sucesso.', ['user' => $user]);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Log::info("Iniciando a exclusão do usuário ID: $id.");

        $usuario = User::findOrFail($id);
        $usuario->delete();

        Log::info("Usuário ID: $id excluído com sucesso.");

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }
}

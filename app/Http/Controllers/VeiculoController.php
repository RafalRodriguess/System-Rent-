<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::paginate(4);
        return view('veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        return view('veiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer',
            'categoria' => 'required|in:carro,moto',
            'valor_diaria' => 'required|numeric',
            'status' => 'required|in:disponivel,alugado,manutencao',
            'imagem' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imagemPath = $request->file('imagem')->store('veiculos', 'public');
        } else {
            return back()->withErrors(['imagem' => 'Erro ao fazer upload da imagem.']);
        }

        try {
            Veiculo::create([
                'nome' => $request->nome,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'ano' => $request->ano,
                'categoria' => $request->categoria,
                'valor_diaria' => $request->valor_diaria,
                'status' => $request->status,
                'imagem' => $imagemPath,
            ]);

            return redirect()->route('veiculos.index')->with('success', 'Veículo criado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Houve um erro ao criar o veículo.']);
        }
    }

    public function show(Veiculo $veiculo)
    {
        return view('veiculos.show', compact('veiculo'));
    }

    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        return view('veiculos.edit', compact('veiculo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer',
            'categoria' => 'required|in:carro,moto',
            'valor_diaria' => 'required|numeric',
            'status' => 'required|in:disponivel,alugado,manutencao',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $veiculo = Veiculo::findOrFail($id);

        $veiculo->update([
            'nome' => $request->nome,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'ano' => $request->ano,
            'categoria' => $request->categoria,
            'valor_diaria' => $request->valor_diaria,
            'status' => $request->status,
            'imagem' => $request->hasFile('imagem') ? $request->file('imagem')->store('veiculos', 'public') : $veiculo->imagem,
        ]);

        return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy(Veiculo $veiculo)
    {
        try {
            $veiculo->delete();
            return redirect()->route('veiculos.index')->with('success', 'Veículo excluído com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Houve um erro ao excluir o veículo.']);
        }
    }
}

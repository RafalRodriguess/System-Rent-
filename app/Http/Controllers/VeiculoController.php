<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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
        Log::info('Início do processo de criação de veículo');

        // Logando os dados recebidos para verificação
        Log::info('Dados recebidos para validação', $request->all());

        try {
            // Validação dos campos
            $request->validate([
                'nome' => 'required|string|max:255',
                'marca' => 'required|string|max:255',
                'modelo' => 'required|string|max:255',
                'ano' => 'required|integer',
                'categoria' => 'required|in:carro,moto',
                'valor_diaria' => 'required|numeric',
                'status' => 'required|in:disponivel,alugado,manutencao',
                'imagem' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'ar_condicionado' => 'required|boolean',
                'combustivel' => 'required|in:gasolina,alcool,flex',
                'portas' => 'required|in:2,4',
                'assentos' => 'required|in:5,7',
                'caucao' => 'required|numeric',
            ]);

            Log::info('Validação de entrada concluída');

            // Processamento da imagem
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                $imagemPath = $request->file('imagem')->store('veiculos', 'public');
                Log::info('Imagem armazenada com sucesso: ' . $imagemPath);
            } else {
                Log::error('Erro ao fazer upload da imagem.');
                return back()->withErrors(['imagem' => 'Erro ao fazer upload da imagem.']);
            }

            // Criando o veículo no banco de dados
            Veiculo::create([
                'nome' => $request->nome,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'ano' => $request->ano,
                'categoria' => $request->categoria,
                'valor_diaria' => $request->valor_diaria,
                'status' => $request->status,
                'imagem' => $imagemPath,
                'ar_condicionado' => $request->ar_condicionado,
                'combustivel' => $request->combustivel,
                'portas' => $request->portas,
                'assentos' => $request->assentos,
                'caucao' => $request->caucao,
            ]);

            Log::info('Veículo criado com sucesso');

            return redirect()->route('veiculos.index')->with('success', 'Veículo criado com sucesso!');
        } catch (ValidationException $e) {
            // Caso a validação falhe, loga os erros específicos
            Log::error('Falha na validação', ['errors' => $e->errors()]);
            return back()->withErrors($e->errors());
        } catch (\Exception $e) {
            // Captura qualquer outro erro no processo
            Log::error('Erro ao criar o veículo: ' . $e->getMessage());
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
            'caucao' => 'required|numeric',
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
            'caucao' => $request->caucao,
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

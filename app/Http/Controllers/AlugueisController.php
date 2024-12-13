<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\Aluguel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 
use Carbon\Carbon;

class AlugueisController extends Controller
{
    public function index()
    {
        $alugueis = Aluguel::all();
        $clientes = Cliente::all();
        $veiculos = Veiculo::all();
        $veiculo = null; 

        return view('site.aluguel.index', compact('alugueis', 'clientes', 'veiculos'));
    }

    public function dashboardIndex(Request $request)
    {
        $alugueis = Aluguel::with(['cliente', 'veiculo'])->paginate(10); 
        
        
        if ($request->has('status')) {
            $alugueis->where('status', $request->status);
        }
    
        return view('.alugueis.index', compact('alugueis'));
    }
    
    public function create(Request $request)
    {
        $veiculo_id = $request->input('veiculo_id'); 
        $veiculo = null;
    
        if ($veiculo_id) {
            $veiculo = Veiculo::find($veiculo_id); 
        }
    
        $clientes = Cliente::all(); 
        $veiculos = Veiculo::all(); 
    
        return view('site.aluguel.create', compact('clientes', 'veiculos', 'veiculo'));
    }
    

    public function store(Request $request)
    {
        $data_inicio = Carbon::parse($request->data_inicio)->startOfDay();
        $data_fim = Carbon::parse($request->data_fim)->endOfDay();
    
        
        if ($data_fim->lt($data_inicio)) {
            return back()->withErrors(['error' => 'A data final precisa ser maior ou igual à data de início.']);
        }
    
        $dias = $data_inicio->diffInDays($data_fim) + 1;
    
       
        $veiculo = Veiculo::findOrFail($request->veiculo_id);
        $valor_total = $dias * $veiculo->valor_diaria;
    
        try {
           
            $aluguel = Aluguel::create([
                'cliente_id' => $request->cliente_id,
                'veiculo_id' => $request->veiculo_id,
                'data_inicio' => $data_inicio,
                'data_fim' => $data_fim,
                'status' => 'em andamento',
                'valor_total' => $valor_total,
            ]);
    
          
    
            return redirect()->route('site.aluguel.show', $aluguel->id)->with('success', 'Aluguel criado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Houve um erro ao criar o aluguel.']);
        }
    }
    

    public function show($id)
    {
        $aluguel = Aluguel::with(['cliente', 'veiculo'])->findOrFail($id);
    
       
        \Log::info('Exibindo os detalhes do aluguel', ['aluguel' => $aluguel]);
    
        return view('site.aluguel.show', compact('aluguel'));
    }

    


}

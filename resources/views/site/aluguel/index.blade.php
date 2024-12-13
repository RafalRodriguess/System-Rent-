@extends('layout.site')

@section('title', 'Cadastrar Aluguel')

@section('content')

<!-- Cadastro de Aluguel -->
<section class="auth bg-base py-5" style="min-height: 100vh;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="mb-3">Cadastrar Aluguel</h2>
                    <p class="text-secondary-light">Preencha as informações abaixo para registrar o aluguel.</p>
                </div>
            </div>
        </div>

        <!-- Exibição de erros -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('site.aluguel.store') }}" method="POST">
            @csrf

            <!-- Cliente (preenchido automaticamente) -->
            <input type="hidden" name="cliente_id" value="{{ auth()->guard('clientes')->check() ? auth()->guard('clientes')->user()->id : '' }}">

            <!-- Status (enviado como oculto para o banco de dados) -->
            <input type="hidden" name="status" value="pendente">

            <div class="row gy-4">
                <!-- Veículo -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="veiculo_id" class="form-label">Veículo</label>
                        <select name="veiculo_id" id="veiculo_id" class="form-control" onchange="carregarDiaria()" required>
                            <option value="">Selecione um Veículo</option>
                            @foreach($veiculos as $veiculo)
                                <option value="{{ $veiculo->id }}" data-diaria="{{ $veiculo->valor_diaria }}">
                                    {{ $veiculo->modelo }} - {{ $veiculo->marca }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Data Início e Data Fim -->
                <div class="col-md-6">
                    <div class="form-group d-flex gap-3">
                        <div>
                            <label for="data_inicio" class="form-label">Data Início</label>
                            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
                        </div>
                        <div>
                            <label for="data_fim" class="form-label">Data Fim</label>
                            <input type="date" name="data_fim" id="data_fim" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Valor Diária -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="valor_diaria" class="form-label">Valor Diária</label>
                        <p id="valor_diaria" class="form-control-plaintext">R$ 0,00</p>
                    </div>
                </div>

                <!-- Valor Total -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="valor_total" class="form-label">Valor Total</label>
                        <p id="valor_total" class="form-control-plaintext">R$ 0,00</p>
                    </div>
                </div>

                <!-- Botão de envio -->
                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-lg w-100">Criar Aluguel</button>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    document.getElementById('data_inicio').addEventListener('change', calcularValorTotal);
    document.getElementById('data_fim').addEventListener('change', calcularValorTotal);

    function carregarDiaria() {
        const veiculoSelect = document.getElementById('veiculo_id');
        const diaria = veiculoSelect.options[veiculoSelect.selectedIndex]?.getAttribute('data-diaria') || 0;
        document.getElementById('valor_diaria').innerText = `R$ ${parseFloat(diaria).toFixed(2)}`;
        calcularValorTotal();
    }

    function calcularValorTotal() {
        const dataInicio = document.getElementById('data_inicio').value;
        const dataFim = document.getElementById('data_fim').value;
        const valorDiaria = parseFloat(document.getElementById('veiculo_id').options[document.getElementById('veiculo_id').selectedIndex]?.getAttribute('data-diaria') || 0);

        if (dataInicio && dataFim && !isNaN(valorDiaria)) {
            const inicio = new Date(dataInicio);
            const fim = new Date(dataFim);
            const dias = Math.ceil((fim - inicio) / (1000 * 3600 * 24)) + 1;
            if (dias > 0) {
                const valorTotal = dias * valorDiaria;
                document.getElementById('valor_total').innerText = `R$ ${valorTotal.toFixed(2)}`;
            } else {
                document.getElementById('valor_total').innerText = 'R$ 0,00';
            }
        }
    }
</script>

@endsection

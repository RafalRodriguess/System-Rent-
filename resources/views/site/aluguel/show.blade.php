@extends('layout.site')

@section('content')

<!-- Resumo da Reserva -->
<section class="bg-light py-4">
    <div class="container">
        <!-- Mensagem de sucesso -->
        <div class="alert alert-success d-flex align-items-center justify-content-between" role="alert">
            <div>
                <i class="fas fa-check-circle me-2"></i>
                <strong>Reserva confirmada com sucesso!</strong>
            </div>
            <button class="btn btn-outline-success btn-sm" onclick="window.print()">
                <i class="fas fa-print"></i> Imprimir
            </button>
        </div>

        <!-- Imagem do veículo -->
        <div class="text-center mb-4">
            @if($aluguel->veiculo->imagem && file_exists(public_path('storage/' . $aluguel->veiculo->imagem)))
                <img src="{{ asset('storage/' . $aluguel->veiculo->imagem) }}" alt="{{ $aluguel->veiculo->modelo }}" class="img-fluid rounded shadow" style="max-width: 500px; max-height: 300px;">
            @else
                <img src="{{ asset('assets/images/default-car.png') }}" alt="Imagem não disponível" class="img-fluid rounded shadow" style="max-width: 500px; max-height: 300px;">
            @endif
        </div>

        <!-- Resumo da Reserva -->
        <div class="card p-4 border-0 shadow-sm rounded">
            <h7 class="text-success mb-4">Resumo da sua reserva</h7>
            <div class="row g-4">
                <!-- Código da Reserva -->
                <div class="col-md-3">
                    <h6 class="text-muted">Código da reserva</h6>
                    <p class="text-primary fw-bold">{{ $aluguel->id }}</p>
                </div>

                <!-- Informações de Retirada -->
                <div class="col-md-3">
                    <h6 class="text-success mb-4">Retirada</h6>
                    <p>
                        <i class="fas fa-calendar-alt me-2"></i> {{ \Carbon\Carbon::parse($aluguel->data_inicio)->format('d/m/Y H:i') }}<br>
                        <i class="fas fa-map-marker-alt me-2"></i> Centro - Fortaleza<br>
                        Av Abolição, 2236, Meireles<br>
                        Fortaleza - CE
                    </p>
                </div>

                <!-- Informações de Devolução -->
                <div class="col-md-3">
                    <h6 class="text-success mb-4">Devolução</h6>
                    <p>
                        <i class="fas fa-calendar-alt me-2"></i> {{ \Carbon\Carbon::parse($aluguel->data_fim)->format('d/m/Y H:i') }}<br>
                        <i class="fas fa-map-marker-alt me-2"></i> Centro - Fortaleza<br>
                        Av Abolição, 2236, Meireles<br>
                        Fortaleza - CE
                    </p>
                </div>

                <!-- Detalhes do Veículo -->
                <div class="col-md-3">
                    <h6 class="text-success mb-4">Detalhes do veículo</h6>
                    <p>
                        <strong>{{ $aluguel->veiculo->modelo }} - {{ $aluguel->veiculo->marca }}</strong><br>
                        <small>
                            <i class="fas fa-car me-2"></i>{{ $aluguel->veiculo->assentos }} Assentos<br>
                            <i class="fas fa-door-open me-2"></i>{{ $aluguel->veiculo->portas }} Portas<br>
                            <i class="fas fa-snowflake me-2"></i>Ar Condicionado: {{ $aluguel->veiculo->ar_condicionado == 1 ? 'Sim' : 'Não' }}<br>
                            <i class="fas fa-gas-pump me-2"></i>{{ ucfirst($aluguel->veiculo->combustivel) }}
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

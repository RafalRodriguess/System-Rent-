@extends('layout.layout')
@php
    $title = 'Ver Veículo';
    $subTitle = 'Detalhes do Veículo';
@endphp

@section('content')
<div class="row gy-4">
    <!-- Card de Informações do Veículo -->
    <div class="col-lg-4">
        <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
        <div style="background-color: #28a745; height: 100px;" class="w-100"></div>
            <div class="pb-24 ms-16 mb-24 me-16 mt--100">
                <div class="text-center border border-top-0 border-start-0 border-end-0">
                    <img src="{{ $veiculo->imagem ? asset('storage/' . $veiculo->imagem) : asset('assets/images/default-car.png') }}" 
                    class="img-fluid w-100" 
                    style="max-height: 300px; object-fit: cover;">

                    <h6 class="mb-0 mt-16">{{ $veiculo->modelo }}</h6>
                    <span class="text-secondary-light mb-16">{{ $veiculo->marca }}</span>
                </div>
                <div class="mt-24">
                    <h6 class="text-xl mb-16">Informações do Veículo</h6>
                    <ul>
                        <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Modelo</span>
                            <span class="w-70 text-secondary-light fw-medium">: {{ $veiculo->modelo }}</span>
                        </li>
                        <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Marca</span>
                            <span class="w-70 text-secondary-light fw-medium">: {{ $veiculo->marca }}</span>
                        </li>
                        <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Ano</span>
                            <span class="w-70 text-secondary-light fw-medium">: {{ $veiculo->ano }}</span>
                        </li>
                        <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Assentos</span>
                            <span class="w-70 text-secondary-light fw-medium">: {{ $veiculo->assentos }}</span>
                        </li>
                        <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Portas</span>
                            <span class="w-70 text-secondary-light fw-medium">: {{ $veiculo->portas }}</span>
                        </li>
                        <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Valor Diária</span>
                            <span class="w-70 text-secondary-light fw-medium">: R$ {{ number_format($veiculo->valor_diaria, 2, ',', '.') }}</span>
                        </li>
                        <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Status</span>
                            <span class="w-70 text-secondary-light fw-medium">: 
                                <span class="badge bg-{{ $veiculo->status === 'disponivel' ? 'success' : ($veiculo->status === 'alugado' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($veiculo->status) }}
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Card de Aluguéis Relacionados ao Veículo -->
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-body p-24">
                <h6 class="text-xl mb-16">Aluguéis</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Data Início</th>
                            <th>Data Fim</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($veiculo->alugueis as $aluguel)
                            <tr>
                                <td>{{ $aluguel->id }}</td>
                                <td>{{ $aluguel->cliente->nome ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($aluguel->data_inicio)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($aluguel->data_fim)->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge bg-{{ $aluguel->status === 'em andamento' ? 'warning' : ($aluguel->status === 'finalizado' ? 'success' : 'secondary') }}">
                                        {{ ucfirst($aluguel->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('alugueis.show', $aluguel->id) }}" class="btn btn-success">Ver</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Nenhum aluguel encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

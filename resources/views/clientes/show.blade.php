@extends('layout.layout')
@php
    $title = 'Ver Cliente';
    $subTitle = 'Detalhes do Cliente';
@endphp

@section('content')
<div class="row gy-4">
    <!-- Card de Informações Básicas do Cliente -->
    <div class="col-lg-4">
        <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
            <img src="{{ asset('assets/images/user-grid/user-grid-bg1.png') }}" alt="" class="w-100 object-fit-cover">
            <div class="pb-24 ms-16 mb-24 me-16 mt--100">
                <div class="text-center border border-top-0 border-start-0 border-end-0">
                    <img src="{{ $cliente->imagem ? asset('storage/' . $cliente->imagem) : asset('assets/images/default-user.png') }}" 
                         alt="Imagem do Cliente" 
                         class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover">
                    <h6 class="mb-0 mt-16">{{ $cliente->nome }}</h6>
                    <span class="text-secondary-light mb-16">{{ $cliente->email }}</span>
                </div>
                <div class="mt-24">
                    <h6 class="text-xl mb-16">Informações Pessoais</h6>
                    <ul>
                        <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Nome Completo</span>
                            <span class="w-70 text-secondary-light fw-medium">: {{ $cliente->nome }}</span>
                        </li>
                        <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Email</span>
                            <span class="w-70 text-secondary-light fw-medium">: {{ $cliente->email }}</span>
                        </li>
                        <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Telefone</span>
                            <span class="w-70 text-secondary-light fw-medium">: {{ $cliente->telefone ?? 'Não informado' }}</span>
                        </li>
                        <li class="d-flex align-items-center gap-1 mb-12">
                            <span class="w-30 text-md fw-semibold text-primary-light">Endereço</span>
                            <span class="w-70 text-secondary-light fw-medium">: {{ $cliente->endereco ?? 'Não informado' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Card de Aluguéis Relacionados ao Cliente -->
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-body p-24">
                <h6 class="text-xl mb-16">Aluguéis Relacionados</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Veículo</th>
                            <th>Data Início</th>
                            <th>Data Fim</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cliente->alugueis as $aluguel)
                            <tr>
                                <td>{{ $aluguel->id }}</td>
                                <td>{{ $aluguel->veiculo->modelo ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($aluguel->data_inicio)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($aluguel->data_fim)->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge bg-{{ $aluguel->status === 'em andamento' ? 'warning' : ($aluguel->status === 'finalizado' ? 'success' : 'secondary') }}">
                                        {{ ucfirst($aluguel->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('alugueis.show', $aluguel->id) }}" class="btn btn-sm btn-info">Ver</a>
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

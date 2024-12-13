@extends('layout.layout')

@php
    $title = 'Detalhes do Aluguel';
    $subTitle = 'Informações do Aluguel';
@endphp

@section('content')

    <div class="row gy-4">
        <div class="col-lg-4">
            <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">

                <div style="background-color: #28a745; height: 200px;" class="w-100"></div>
                <div class="pb-24 ms-16 mb-24 me-16 mt--100">
                    <div class="text-center border border-top-0 border-start-0 border-end-0">

                        @if ($aluguel->veiculo->imagem && file_exists(public_path('storage/' . $aluguel->veiculo->imagem)))
                        <img src="{{ asset('storage/' . $aluguel->veiculo->imagem) }}" 
     alt="{{ $aluguel->veiculo->modelo }}" 
     class="img-fluid w-100" 
     style="max-height: 300px; object-fit: cover;">
                        @else
                            <img src="{{ asset('assets/images/default-car.png') }}" 
                                 alt="Imagem não disponível" 
                                 class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover">
                        @endif
                        <h6 class="mb-0 mt-16">{{ $aluguel->veiculo->modelo ?? 'Modelo não encontrado' }}</h6>
                        <span class="text-secondary-light mb-16">{{ $aluguel->veiculo->marca ?? 'Marca não encontrada' }}</span>
                    </div>
                    <div class="mt-24">
                        <h6 class="text-xl mb-16">Informações do Aluguel</h6>
                        <ul>
                        <li class="d-flex align-items-center gap-1 mb-12">
    <span class="w-30 text-md fw-semibold text-primary-light">Cliente</span>
    <span class="w-70 text-secondary-light fw-medium">
        : {{ $aluguel->cliente->nome ?? 'Não informado' }}
        @if(isset($aluguel->cliente))
            <a href="{{ route('clientes.show', $aluguel->cliente->id) }}" class="text-primary-light ms-2" title="Ver Cliente">
                <iconify-icon icon="mdi:eye-outline" class="icon text-xl"></iconify-icon>
            </a>
        @endif
    </span>
</li>

                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Data de Retirada</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ \Carbon\Carbon::parse($aluguel->data_inicio)->format('d/m/Y') }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Data de Devolução</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ \Carbon\Carbon::parse($aluguel->data_fim)->format('d/m/Y') }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Status</span>
                                <span class="w-70 text-secondary-light fw-medium">
                                : {{ ucfirst($aluguel->status) }}
                            </span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Valor Total</span>
                                <span class="w-70 text-secondary-light fw-medium">: R$ {{ number_format($aluguel->valor_total, 2, ',', '.') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

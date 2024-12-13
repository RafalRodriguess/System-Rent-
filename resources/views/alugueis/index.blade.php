@extends('layout.layout')

@php
    $title = 'Aluguéis';
    $subTitle = 'Listagem de Aluguéis';
@endphp

@section('content')

    <div class="card h-100 p-0 radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <form class="d-flex align-items-center" method="GET">
                    <select name="status" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px me-2">
                        <option value="">Todos</option>
                        <option value="em andamento">Em Andamento</option>
                        <option value="finalizado">Finalizado</option>
                        <option value="pendente">Pendente</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>
        </div>

        <div class="card-body p-24">
            <div class="row gy-4">
                @foreach($alugueis as $aluguel)
                    <div class="col-xxl-3 col-md-6 user-grid-card">
                        <div class="position-relative border radius-16 overflow-hidden">
                            <div style="background-color: #28a745; height: 100px;" class="w-100"></div>
                            <div class="dropdown position-absolute top-0 end-0 me-16 mt-16">
                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false" class="bg-white-gradient-light w-32-px h-32-px radius-8 border border-light-white d-flex justify-content-center align-items-center text-white">
                                    <iconify-icon icon="entypo:dots-three-vertical" class="icon"></iconify-icon>
                                </button>
                                <ul class="dropdown-menu p-12 border bg-base shadow">
                                    <li>
                                        <a class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10" href="#">Ver Detalhes</a>
                                    </li>
                                    <li>
                                        <button type="button" class="delete-btn dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-danger-100 text-hover-danger-600 d-flex align-items-center gap-10">
                                            Excluir
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            <div class="ps-16 pb-16 pe-16 text-center mt--50">
                                @if ($aluguel->veiculo->imagem && file_exists(public_path('storage/' . $aluguel->veiculo->imagem)))
                                    <img src="{{ asset('storage/' . $aluguel->veiculo->imagem) }}" alt="{{ $aluguel->veiculo->modelo }}" class="img-fluid mb-2" style="height: 150px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('assets/images/default-car.png') }}" alt="Sem imagem" class="img-fluid mb-2" style="height: 150px; object-fit: cover;">
                                @endif
                                <h6 class="text-lg mb-0 mt-4">{{ $aluguel->veiculo->modelo ?? 'Modelo não encontrado' }}</h6>
                                <span class="text-secondary-light mb-16">{{ $aluguel->veiculo->marca ?? 'Marca não encontrada' }}</span>

                                <div class="center-border position-relative bg-danger-gradient-light radius-8 p-12 d-flex align-items-center gap-4">
                                    <div class="text-center w-50">
                                        <h6 class="text-md mb-0">Início</h6>
                                        <span class="text-secondary-light text-sm mb-0">{{ \Carbon\Carbon::parse($aluguel->data_inicio)->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="text-center w-50">
                                        <h6 class="text-md mb-0">Fim</h6>
                                        <span class="text-secondary-light text-sm mb-0">{{ \Carbon\Carbon::parse($aluguel->data_fim)->format('d/m/Y') }}</span>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <span class="badge bg-{{ $aluguel->status === 'em andamento' ? 'warning' : ($aluguel->status === 'finalizado' ? 'success' : 'secondary') }}">
                                        {{ ucfirst($aluguel->status) }}
                                    </span>
                                </div>

                                <a href="{{ route('alugueis.show', $aluguel->id) }}" class="bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white p-10 text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center justify-content-center mt-16 fw-medium gap-2 w-100">
                                    Detalhes do Aluguel
                                    <iconify-icon icon="solar:alt-arrow-right-linear" class="icon text-xl line-height-1"></iconify-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                <span>Exibindo {{ $alugueis->count() }} de {{ $alugueis->total() }} Aluguéis</span>
                {{ $alugueis->links('pagination.custom') }}
            </div>
        </div>
    </div>

@endsection

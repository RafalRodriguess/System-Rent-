@extends('layout.layout')
@php
    $title = 'Veiculos';
    $subTitle = 'Listagem de Veiculos';
@endphp

@section('content')

    <div class="card h-100 p-0 radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
            <div class="d-flex align-items-center flex-wrap gap-3">
                <span class="text-md fw-medium text-secondary-light mb-0"></span>
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
                <form class="navbar-search">
                    <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Procurar carro... ">
                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                </form>
            </div>
            <a href="{{ route('veiculos.create') }}" class="btn btn-success text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                Adicionar novo veiculo
            </a>
        </div>

        <div class="card-body p-24">
            <div class="row gy-4">
                @foreach($veiculos as $veiculo)
                    <div class="col-xxl-3 col-md-6 user-grid-card">
                        <div class="position-relative border radius-16 overflow-hidden">
                            <div style="background-color: #28a745; height: 100px;" class="w-100"></div>
                            <div class="dropdown position-absolute top-0 end-0 me-16 mt-16">
                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false" class="bg-white-gradient-light w-32-px h-32-px radius-8 border border-light-white d-flex justify-content-center align-items-center text-white">
                                    <iconify-icon icon="entypo:dots-three-vertical" class="icon"></iconify-icon>
                                </button>
                                <ul class="dropdown-menu p-12 border bg-base shadow">
                                    <li>
                                        <a class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10" href="{{ route('veiculos.edit', $veiculo->id) }}">Editar</a>
                                    </li>
                                    <li>
                                        <button type="button" class="delete-btn dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-danger-100 text-hover-danger-600 d-flex align-items-center gap-10">
                                            Delete
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            <div class="ps-16 pb-16 pe-16 text-center mt--50">
                            <img src="{{ asset('storage/' . $veiculo->imagem) }}" alt="{{ $veiculo->nome }}">
                                <h6 class="text-lg mb-0 mt-4">{{ $veiculo->nome }}</h6>
                                <span class="text-secondary-light mb-16">{{ $veiculo->marca }}</span>

                                <div class="center-border position-relative bg-danger-gradient-light radius-8 p-12 d-flex align-items-center gap-4">
                                    <div class="text-center w-50">
                                        <h6 class="text-md mb-0">{{ $veiculo-> modelo}}</h6>
                                        <span class="text-secondary-light text-sm mb-0">{{ $veiculo->ano }}</span>
                                    </div>
                                    <div class="text-center w-50">
    <h6 class="text-md mb-0">Valor da Diária <br> R$ {{ number_format($veiculo->valor_diaria, 2, ',', '.') }}</h6>
    @if($veiculo->status === 'disponivel')
        <span class="text-secondary-light text-sm mb-0" style="color: green;">{{ ucfirst($veiculo->status) }}</span>
    @elseif($veiculo->status === 'alugado')
        <span class="text-secondary-light text-sm mb-0" style="color: red;">{{ ucfirst($veiculo->status) }}</span>
    @elseif($veiculo->status === 'manutencao')
        <span class="text-secondary-light text-sm mb-0" style="color: black;">{{ ucfirst($veiculo->status) }}</span>
    @endif
</div>

                                </div>
                                <a href="{{ route('veiculos.show', $veiculo->id) }}" class="bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white p-10 text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center justify-content-center mt-16 fw-medium gap-2 w-100">
    Ver Alugueis
    <iconify-icon icon="solar:alt-arrow-right-linear" class="icon text-xl line-height-1"></iconify-icon>
</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                <span>Exibindo {{ $veiculos->count() }} de {{ $veiculos->total() }} Veiculos</span>
                {{ $veiculos->links('pagination.custom') }}
            </div>
        </div>
    </div>

@endsection

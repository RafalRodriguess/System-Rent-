@extends('layout.layout')

@php
    $title = 'Painel de Controle';
    $subTitle = 'Gestão de Alugueis';
    $script = '<script src="' . asset('assets/js/homeOneChart.js') . '"></script>';
@endphp

@section('content')

<div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total de Veículos</p>
                        <h6 class="mb-0">{{ $totalVeiculos }}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:car-sports" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center gap-1 text-success-main">
                        <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +10
                    </span>
                    Últimos 30 dias
                </p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-2 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total de Aluguéis</p>
                        <h6 class="mb-0">{{ $totalAlugueis }}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:clipboard-list" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center gap-1 text-danger-main">
                        <iconify-icon icon="bxs:down-arrow" class="text-xs"></iconify-icon> -50
                    </span>
                    Últimos 30 dias
                </p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total de Clientes</p>
                        <h6 class="mb-0">{{ $totalClientes }}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mdi:account-group" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center gap-1 text-success-main">
                        <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +5
                    </span>
                    Últimos 30 dias
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Estatísticas e Gráficos -->

<div class="row gy-4 mt-1">
    <div class="col-xxl-6 col-xl-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <h6 class="text-lg mb-0">Estatísticas de Aluguéis</h6>
                    <select class="form-select bg-base form-select-sm w-auto">
                        <option>Anual</option>
                        <option>Mensal</option>
                        <option>Semanal</option>
                        <option>Hoje</option>
                    </select>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2 mt-8">
                    <h6 class="mb-0">€ 12.500</h6>
                    <span class="text-sm fw-semibold rounded-pill bg-success-focus text-success-main border br-success px-8 py-4 line-height-1 d-flex align-items-center gap-1">
                        8% <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                    </span>
                    <span class="text-xs fw-medium">+ €1.000 por dia</span>
                </div>
                <div id="chart" class="pt-28 apexcharts-tooltip-style-1"></div>
            </div>
        </div>
    </div>
    <!-- Gráficos adicionais continuam... -->
</div>

@endsection

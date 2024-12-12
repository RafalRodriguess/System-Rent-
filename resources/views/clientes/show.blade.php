@extends('layout.layout')
@php
    $title='Ver Perfil';
    $subTitle = 'Detalhes do Usuário';
@endphp

@section('content')

    <div class="row gy-4">
        <div class="col-lg-4">
            <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">

                <div style="background-color: #28a745; height: 200px;" class="w-100"></div>
                <div class="pb-24 ms-16 mb-24 me-16 mt--100">
                    <div class="text-center border border-top-0 border-start-0 border-end-0">

                        <img src="{{ $usuario->profile_image ? asset('storage/' . ltrim($usuario->profile_image, '/')) : asset('assets/images/default-user.png') }}"
                             alt="Imagem de Perfil"
                             class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover">
                        <h6 class="mb-0 mt-16">{{ $usuario->nome }}</h6>
                        <span class="text-secondary-light mb-16">{{ $usuario->email }}</span>
                    </div>
                    <div class="mt-24">
                        <h6 class="text-xl mb-16">Informações Pessoais</h6>
                        <ul>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Nome Completo</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ $usuario->nome }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Email</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ $usuario->email }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Telefone</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ $usuario->telefone ?? 'Não informado' }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Tipo</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ ucfirst($usuario->tipo) }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Status</span>
                                <span class="w-70 text-secondary-light fw-medium">
                                : {{ $usuario->status ? 'Ativo' : 'Inativo' }}
                            </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

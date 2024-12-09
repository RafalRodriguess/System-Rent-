@extends('layout.layout')
@php
$title = 'Adicionar Veículo';
$subTitle = 'Adicionar Veículo';
@endphp

@section('content')

<div class="row gy-4">
    <div class="col-lg-12">
        <div class="card h-100">
            <div class="card-body p-24">
                <!-- Navegação entre as abas -->
                <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link d-flex align-items-center px-24 active" id="pills-info-veiculo-tab" data-bs-toggle="pill" data-bs-target="#pills-info-veiculo" type="button" role="tab" aria-controls="pills-info-veiculo" aria-selected="true">
                            Informações do Veículo
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link d-flex align-items-center px-24" id="pills-acessorios-tab" data-bs-toggle="pill" data-bs-target="#pills-acessorios" type="button" role="tab" aria-controls="pills-acessorios" aria-selected="false">
                            Acessórios
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link d-flex align-items-center px-24" id="pills-valores-tab" data-bs-toggle="pill" data-bs-target="#pills-valores" type="button" role="tab" aria-controls="pills-valores" aria-selected="false">
                            Valores
                        </button>
                    </li>
                </ul>

                <!-- Formulário para criação do veículo -->
                <form action="{{ route('veiculos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="tab-content" id="pills-tabContent">

                        <!-- Aba 1: Informações do Veículo -->
                        <div class="tab-pane fade show active" id="pills-info-veiculo" role="tabpanel" aria-labelledby="pills-info-veiculo-tab">
                            <h6 class="text-md text-primary-light mb-16">Informações do Veículo</h6>

                            <div class="row">
                                <!-- Imagem do Veículo -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="imagem" class="form-label fw-semibold text-primary-light text-sm mb-8">Imagem do Veículo</label>
                                        <input type="file" class="form-control radius-8" id="imagem" name="imagem" accept="image/*" required>
                                    </div>
                                </div>

                                <!-- Nome do Veículo -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="nome" class="form-label fw-semibold text-primary-light text-sm mb-8">Nome do Veículo <span class="text-danger-600">*</span></label>
                                        <input type="text" class="form-control radius-8" id="nome" name="nome" placeholder="Digite o nome do veículo" required>
                                    </div>
                                </div>

                                <!-- Marca do Veículo -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="marca" class="form-label fw-semibold text-primary-light text-sm mb-8">Marca do Veículo <span class="text-danger-600">*</span></label>
                                        <input type="text" class="form-control radius-8" id="marca" name="marca" placeholder="Digite a marca do veículo" required>
                                    </div>
                                </div>

                                <!-- Modelo do Veículo -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="modelo" class="form-label fw-semibold text-primary-light text-sm mb-8">Modelo do Veículo <span class="text-danger-600">*</span></label>
                                        <input type="text" class="form-control radius-8" id="modelo" name="modelo" placeholder="Digite o modelo do veículo" required>
                                    </div>
                                </div>

                                <!-- Ano do Veículo -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="ano" class="form-label fw-semibold text-primary-light text-sm mb-8">Ano do Veículo <span class="text-danger-600">*</span></label>
                                        <input type="number" class="form-control radius-8" id="ano" name="ano" placeholder="Digite o ano do veículo" required>
                                    </div>
                                </div>
                                <!-- Categoria -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="tipo" class="form-label fw-semibold text-primary-light text-sm mb-8">Tipo De Veiculo <span class="text-danger-600">*</span></label>
                                        <select class="form-control radius-8 form-select" id="categoria" name="categoria">
                                            <option value="carro">Carro </option>
                                            <option value="moto">Moto </option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Status -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="tipo" class="form-label fw-semibold text-primary-light text-sm mb-8">Status <span class="text-danger-600">*</span></label>
                                        <select class="form-control radius-8 form-select" id="status" name="status">
                                            <option value="disponivel">Disponivel </option>
                                            <option value="alugado">Alugado </option>
                                            <option value="manutencao">Manutenção </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between gap-3">
                                <button type="button" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">Cancelar</button>
                                <button type="button" class="btn btn-success next-btn px-56 py-12 radius-8">Próximo</button>
                            </div>
                        </div>

                        <!-- Aba 2: Acessórios -->
                        <div class="tab-pane fade" id="pills-acessorios" role="tabpanel" aria-labelledby="pills-acessorios-tab">
                            <h6 class="text-md text-primary-light mb-16">Acessórios</h6>

                            <div class="row">
                                <!-- Ar Condicionado -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="ar_condicionado" class="form-label fw-semibold text-primary-light text-sm mb-8">Ar-condicionado</label>
                                        <select class="form-control radius-8" id="ar_condicionado" name="ar_condicionado" required>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Combustível -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="combustivel" class="form-label fw-semibold text-primary-light text-sm mb-8">Combustível</label>
                                        <select class="form-control radius-8" id="combustivel" name="combustivel" required>
                                            <option value="gasolina">Gasolina</option>
                                            <option value="alcool">Álcool</option>
                                            <option value="flex">Flex</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Portas -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="portas" class="form-label fw-semibold text-primary-light text-sm mb-8">Portas</label>
                                        <select class="form-control radius-8" id="portas" name="portas" required>
                                            <option value="2">2 Portas</option>
                                            <option value="4">4 Portas</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Assentos -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="assentos" class="form-label fw-semibold text-primary-light text-sm mb-8">Assentos</label>
                                        <select class="form-control radius-8" id="assentos" name="assentos" required>
                                            <option value="5">5 Assentos</option>
                                            <option value="7">7 Assentos</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between gap-3">
                                <button type="button" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">Cancelar</button>
                                <button type="button" class="btn btn-success next-btn px-56 py-12 radius-8">Próximo</button>
                            </div>
                        </div>

                        <!-- Aba 3: Valores -->
                        <div class="tab-pane fade" id="pills-valores" role="tabpanel" aria-labelledby="pills-valores-tab">
                            <h6 class="text-md text-primary-light mb-16">Valores</h6>

                            <div class="row">
                                <!-- Valor da Diária -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="valor_diaria" class="form-label fw-semibold text-primary-light text-sm mb-8">Valor da Diária</label>
                                        <input type="number" step="0.01" class="form-control radius-8" id="valor_diaria" name="valor_diaria" placeholder="Digite o valor da diária" required>
                                    </div>
                                </div>

                                <!-- Caução -->
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="caucao" class="form-label fw-semibold text-primary-light text-sm mb-8">Caução</label>
                                        <input type="number" step="0.01" class="form-control radius-8" id="caucao" name="caucao" placeholder="Digite o valor da caução" required>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between gap-3">
                                <button type="button" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">Cancelar</button>
                                <button type="submit" class="btn btn-primary px-56 py-12 radius-8">Criar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nextButtons = document.querySelectorAll('.next-btn');
        nextButtons.forEach(button => {
            button.addEventListener('click', function() {
                const currentTab = document.querySelector('.tab-pane.active');
                const nextTab = currentTab.nextElementSibling;
                if (nextTab) {
                    const nextTabId = nextTab.getAttribute('id');
                    const nextTabButton = document.querySelector([data - bs - target = "#${nextTabId}"]);
                    const bsTab = new bootstrap.Tab(nextTabButton);
                    bsTab.show();
                }
            });
        });
    });
</script>
@endsection
@extends('layout.layout')

@php
    $title = 'Editar Veículo';
    $subTitle = 'Editar Veículo';
    $script = '<script>
        // ================== Image Upload Js Start ===========================
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                    $("#imagePreview").hide();
                    $("#imagePreview").fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Quando o usuário seleciona a imagem
        $("#profile_image").change(function() {
            readURL(this);
        });
        // ================== Image Upload Js End ===========================
    </script>';
@endphp

@section('content')

    <div class="card h-100 p-0 radius-12">
        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">
                            <form action="{{ route('veiculos.update', $veiculo->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Imagem do Veículo -->
                                <h6 class="text-md text-primary-light mb-16">Imagem do Veículo</h6>
                                <div class="mb-24 mt-16">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                            <input type="file" id="profile_image" name="imagem" accept=".png, .jpg, .jpeg" hidden>
                                            <label for="profile_image" class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                                <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                            </label>
                                        </div>
                                        <div class="avatar-preview">
                                            @if($veiculo->imagem)
                                                <div id="imagePreview" style="background-image: url('{{ asset('storage/' . $veiculo->imagem) }}');"></div>
                                            @else
                                                <div id="imagePreview"></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Nome do Veículo -->
                                <div class="mb-20">
                                    <label for="nome" class="form-label fw-semibold text-primary-light text-sm mb-8">Nome do Veículo <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" id="nome" name="nome" placeholder="Digite o nome do veículo" value="{{ old('nome', $veiculo->nome) }}" required>
                                </div>

                                <!-- Marca -->
                                <div class="mb-20">
                                    <label for="marca" class="form-label fw-semibold text-primary-light text-sm mb-8">Marca <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" id="marca" name="marca" placeholder="Digite a marca do veículo" value="{{ old('marca', $veiculo->marca) }}" required>
                                </div>

                                <!-- Modelo -->
                                <div class="mb-20">
                                    <label for="modelo" class="form-label fw-semibold text-primary-light text-sm mb-8">Modelo <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" id="modelo" name="modelo" placeholder="Digite o modelo do veículo" value="{{ old('modelo', $veiculo->modelo) }}" required>
                                </div>

                                <!-- Ano -->
                                <div class="mb-20">
                                    <label for="ano" class="form-label fw-semibold text-primary-light text-sm mb-8">Ano <span class="text-danger-600">*</span></label>
                                    <input type="number" class="form-control radius-8" id="ano" name="ano" placeholder="Digite o ano do veículo" value="{{ old('ano', $veiculo->ano) }}" required>
                                </div>

                                <!-- Categoria -->
                                <div class="mb-20">
                                    <label for="categoria" class="form-label fw-semibold text-primary-light text-sm mb-8">Categoria <span class="text-danger-600">*</span></label>
                                    <select class="form-control radius-8" id="categoria" name="categoria" required>
                                        <option value="carro" {{ $veiculo->categoria == 'carro' ? 'selected' : '' }}>Carro</option>
                                        <option value="moto" {{ $veiculo->categoria == 'moto' ? 'selected' : '' }}>Moto</option>
                                    </select>
                                </div>

                                <!-- Valor da Diária -->
                                <div class="mb-20">
                                    <label for="valor_diaria" class="form-label fw-semibold text-primary-light text-sm mb-8">Valor da Diária <span class="text-danger-600">*</span></label>
                                    <input type="number" step="0.01" class="form-control radius-8" id="valor_diaria" name="valor_diaria" placeholder="Digite o valor da diária" value="{{ old('valor_diaria', $veiculo->valor_diaria) }}" required>
                                </div>

                                <!-- Status -->
                                <div class="mb-20">
                                    <label for="status" class="form-label fw-semibold text-primary-light text-sm mb-8">Status <span class="text-danger-600">*</span></label>
                                    <select class="form-control radius-8" id="status" name="status" required>
                                        <option value="disponivel" {{ $veiculo->status == 'disponivel' ? 'selected' : '' }}>Disponível</option>
                                        <option value="alugado" {{ $veiculo->status == 'alugado' ? 'selected' : '' }}>Alugado</option>
                                        <option value="manutencao" {{ $veiculo->status == 'manutencao' ? 'selected' : '' }}>Em Manutenção</option>
                                    </select>
                                </div>

                                <!-- Botões de Cancelar e Salvar -->
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <a href="{{ route('veiculos.index') }}" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">
                                        Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-success border border-primary-600 text-md px-56 py-12 radius-8">
                                        Atualizar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

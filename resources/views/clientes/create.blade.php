@extends('layout.layout')
@php
    $title = 'Adicionar Usuário';
    $subTitle = 'Adicionar Usuário';
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
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h6 class="text-md text-primary-light mb-16">Imagem de Perfil</h6>

                                <div class="mb-24 mt-16">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                            <input type="file" id="profile_image" name="profile_image" accept=".png, .jpg, .jpeg" hidden>
                                            <label for="profile_image" class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                                <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                            </label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-20">
                                    <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Nome Completo <span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control radius-8" id="name" name="nome" placeholder="Digite o nome completo" required>
                                </div>
                                <div class="mb-20">
                                    <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">E-mail <span class="text-danger-600">*</span></label>
                                    <input type="email" class="form-control radius-8" id="email" name="email" placeholder="Digite o e-mail" required>
                                </div>
                                <div class="mb-20">
                                    <label for="phone" class="form-label fw-semibold text-primary-light text-sm mb-8">Telefone</label>
                                    <input type="text" class="form-control radius-8" id="phone" name="phone" placeholder="Digite o número de telefone">
                                </div>
                                <div class="mb-20">
                                    <label for="senha" class="form-label fw-semibold text-primary-light text-sm mb-8">Senha <span class="text-danger-600">*</span></label>
                                    <input type="password" class="form-control radius-8" id="senha" name="senha" placeholder="Digite a senha" required>
                                </div>
                                <div class="mb-20">
                                    <label for="senha_confirmation" class="form-label fw-semibold text-primary-light text-sm mb-8">Confirmação de Senha <span class="text-danger-600">*</span></label>
                                    <input type="password" class="form-control radius-8" id="senha_confirmation" name="senha_confirmation" placeholder="Confirme a senha" required>
                                </div>
                                <div class="row mb-20">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Tipo de Usuário <span class="text-danger-600">*</span></label>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="form-check checked-success d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="radio" name="type" id="admin" value="admin" required>
                                                <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="admin">Admin</label>
                                            </div>
                                            <div class="form-check checked-success d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="radio" name="type" id="operador" value="operador" required>
                                                <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="operador">Operador</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Status</label>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="form-check checked-success d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="radio" name="status" id="ativo" value="1" checked>
                                                <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="ativo">Ativo</label>
                                            </div>
                                            <div class="form-check checked-success d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="radio" name="status" id="inativo" value="0">
                                                <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="inativo">Inativo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <a href="{{ route('users.index') }}" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">
                                        Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-success border border-primary-600 text-md px-56 py-12 radius-8">
                                        Salvar
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

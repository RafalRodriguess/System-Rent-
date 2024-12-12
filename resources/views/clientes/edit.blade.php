@extends('layout.layout')

@php
    $title = 'Editar Perfil';
    $subTitle = 'Editar Perfil';
    $script = '<script>
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
                    $("#imageUpload").change(function() {
                        readURL(this);
                    });

                    function initializePasswordToggle(toggleSelector) {
                        $(toggleSelector).on("click", function() {
                            $(this).toggleClass("ri-eye-off-line");
                            var input = $($(this).attr("data-toggle"));
                            if (input.attr("type") === "password") {
                                input.attr("type", "text");
                            } else {
                                input.attr("type", "password");
                            }
                        });
                    }
                    initializePasswordToggle(".toggle-password");
              </script>';
@endphp

@section('content')

    <div class="row gy-4">
        <div class="col-lg-4">
            <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                <div style="background-color: #28a745; height: 200px;" class="w-100"></div>
                <div class="pb-24 ms-16 mb-24 me-16 mt--100">
                    <div class="text-center border border-top-0 border-start-0 border-end-0">
                        <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/images/default-user.png') }}"
                             alt="Imagem de Perfil"
                             class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover">
                        <h6 class="mb-0 mt-16">{{ $user->nome }}</h6>
                        <span class="text-secondary-light mb-16">{{ $user->email }}</span>
                    </div>
                    <div class="mt-24">
                        <h6 class="text-xl mb-16">Informações Pessoais</h6>
                        <ul>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Nome Completo</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ $user->nome }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">E-mail</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ $user->email }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Telefone</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ $user->telefone ?? 'Não informado' }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Tipo de Usuário</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ ucfirst($user->tipo) }}</span>
                            </li>
                            <li class="d-flex align-items-center gap-1 mb-12">
                                <span class="w-30 text-md fw-semibold text-primary-light">Status</span>
                                <span class="w-70 text-secondary-light fw-medium">: {{ $user->status == 1 ? 'Ativo' : 'Inativo' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card h-100">
                <div class="card-body p-24">
                    <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-edit-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-edit-profile" type="button" role="tab">
                                Editar Perfil
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-change-password-tab" data-bs-toggle="pill" data-bs-target="#pills-change-password" type="button" role="tab">
                                Alterar Senha
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <!-- Aba Editar Perfil -->
                        <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel">
                            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-24 mt-16">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                            <input type="file" id="imageUpload" name="profile_image" accept=".png, .jpg, .jpeg" hidden>
                                            <label for="imageUpload" class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                                <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                            </label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url('{{ asset('storage/' . $user->profile_image) }}');"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-20">
                                        <label for="name" class="form-label text-primary-light">Nome Completo</label>
                                        <input type="text" class="form-control radius-8" id="name" name="name" value="{{ $user->nome }}" required>
                                    </div>
                                    <div class="col-sm-6 mb-20">
                                        <label for="email" class="form-label text-primary-light">E-mail</label>
                                        <input type="email" class="form-control radius-8" id="email" name="email" value="{{ $user->email }}" required>
                                    </div>
                                    <div class="col-sm-6 mb-20">
                                        <label for="phone" class="form-label text-primary-light">Telefone</label>
                                        <input type="text" class="form-control radius-8" id="phone" name="phone" value="{{ $user->telefone }}">
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center gap-4">
                                        <div>
                                            <label class="form-label fw-semibold text-primary-light text-sm">Tipo de Usuário</label>
                                            <div class="d-flex flex-column gap-2">
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="radio" name="type" id="admin" value="admin" {{ $user->tipo == 'admin' ? 'checked' : '' }}>
                                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="admin">Admin</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="radio" name="type" id="operador" value="operador" {{ $user->tipo == 'operador' ? 'checked' : '' }}>
                                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="operador">Operador</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="form-label fw-semibold text-primary-light text-sm">Status</label>
                                            <div class="d-flex flex-column gap-2">
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="radio" name="status" id="ativo" value="1" {{ $user->status == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="ativo">Ativo</label>
                                                </div>
                                                <div class="form-check d-flex align-items-center gap-2">
                                                    <input class="form-check-input" type="radio" name="status" id="inativo" value="0" {{ $user->status == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="inativo">Inativo</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center gap-3 mt-5">
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </form>
                        </div>
                        <!-- Aba Alterar Senha -->
                        <div class="tab-pane fade" id="pills-change-password" role="tabpanel">
                            <form action="{{ route('users.update-password', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-20">
                                    <label for="password" class="form-label text-primary-light">Nova Senha</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control radius-8" id="password" name="password" placeholder="Digite a nova senha" required>
                                        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16" data-toggle="#password"></span>
                                    </div>
                                </div>
                                <div class="mb-20">
                                    <label for="password_confirmation" class="form-label text-primary-light">Confirme a Nova Senha</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control radius-8" id="password_confirmation" name="password_confirmation" placeholder="Confirme a nova senha" required>
                                        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16" data-toggle="#password_confirmation"></span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center gap-3 mt5">
                                    <button type="submit" class="btn btn-success">Salvar Senha</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<!DOCTYPE html>
<html lang="pt-br" data-theme="light">

<x-head/>

<body>

<section class="auth bg-base d-flex flex-wrap align-items-center justify-content-center min-vh-100">
    <div class="auth-container py-32 px-24 bg-white shadow-sm radius-12">
        <div class="text-center mb-32">
            <a href="{{ route('index') }}" class="mb-40">
                <img src="{{ asset('assets/images/localiza-light.png') }}" alt="Logo Localiza" class="mb-16">
            </a>
            <h4 class="mb-12">Crie sua Conta</h4>
            <p class="text-secondary-light text-md">Bem-vindo! Por favor, preencha os campos abaixo.</p>
        </div>

        <!-- Mensagens de Sucesso ou Erro -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Formulário de Registro -->
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="icon-field mb-16">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="f7:person"></iconify-icon>
                </span>
                <input type="text" name="nome" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Nome de Usuário" value="{{ old('nome') }}" required>
            </div>
            <div class="icon-field mb-16">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="mage:email"></iconify-icon>
                </span>
                <input type="email" name="email" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="E-mail" value="{{ old('email') }}" required>
            </div>
            <div class="mb-20">
                <div class="position-relative">
                    <div class="icon-field">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                        </span>
                        <!-- Campo de Senha -->
                        <input type="password" name="senha" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Senha" required>

                    </div>
                    <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#your-password"></span>
                </div>
                <span class="mt-12 text-sm text-secondary-light">Sua senha deve ter pelo menos 8 caracteres.</span>
            </div>
            <div class="mb-20">
                <div class="position-relative">
                    <div class="icon-field">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                        </span>
                        <!-- Campo de Confirmação de Senha -->
                        <input type="password" name="senha_confirmation" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Confirme a Senha" required>


                    </div>
                    <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#confirm-password"></span>
                </div>
            </div>
            <div class="form-check style-check d-flex align-items-start mb-20">
                <input class="form-check-input border border-neutral-300 mt-4" type="checkbox" value="" id="condition" required>
                <label class="form-check-label text-sm" for="condition">
                    Ao criar uma conta, você concorda com os
                    <a href="javascript:void(0)" class="text-primary-600 fw-semibold">Termos e Condições</a> e nossa
                    <a href="javascript:void(0)" class="text-primary-600 fw-semibold">Política de Privacidade</a>.
                </label>
            </div>

            <button type="submit" class="btn btn-success text-sm btn-sm px-12 py-16 w-100 radius-12">Cadastrar</button>

            <div class="mt-32 center-border-horizontal text-center">
                <span class="bg-base z-1 px-4">Ou cadastre-se com</span>
            </div>
            <div class="mt-32 d-flex align-items-center gap-3">
                <button type="button" class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                    <iconify-icon icon="ic:baseline-facebook" class="text-primary-600 text-xl line-height-1"></iconify-icon>
                    Facebook
                </button>
                <button type="button" class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                    <iconify-icon icon="logos:google-icon" class="text-primary-600 text-xl line-height-1"></iconify-icon>
                    Google
                </button>
            </div>
            <div class="mt-32 text-center text-sm">
                <p class="mb-0">Já possui uma conta? <a href="{{ route('signin') }}" class="text-primary-600 fw-semibold">Entrar</a></p>
            </div>
        </form>
    </div>
</section>

@php
    $script = '<script>
        // ================== Mostrar/Ocultar Senha ==========
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
        // Inicia a função
        initializePasswordToggle(".toggle-password");
    </script>';
@endphp

<x-script />

</body>

</html>

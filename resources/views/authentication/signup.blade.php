<!DOCTYPE html>
<html lang="pt-br" data-theme="light">

<x-head />

<body>

<section class="auth bg-base d-flex flex-wrap align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
        <div class="max-w-464-px mx-auto w-100">
            <div class="text-center">
                <a href="{{ route('index') }}" class="mb-40 max-w-290-px d-block mx-auto">
                    <img src="{{ asset('assets/images/localiza-light.png') }}" alt="Logo">
                </a>
                <h4 class="mb-12">Crie sua Conta</h4>
                <p class="mb-32 text-secondary-light text-lg">Bem-vindo! Por favor, preencha os campos abaixo.</p>
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger mb-16">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Nome de Usuário -->
                <div class="icon-field mb-16">
                    <span class="icon top-50 translate-middle-y">
                        <iconify-icon icon="f7:person"></iconify-icon>
                    </span>
                    <input type="text" name="nome" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Nome de Usuário" value="{{ old('nome') }}" required>
                </div>

                <!-- E-mail -->
                <div class="icon-field mb-16">
                    <span class="icon top-50 translate-middle-y">
                        <iconify-icon icon="mage:email"></iconify-icon>
                    </span>
                    <input type="email" name="email" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Endereço de E-mail" value="{{ old('email') }}" required>
                </div>

                <!-- Senha -->
                <div class="position-relative mb-16">
                    <div class="icon-field">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                        </span>
                        <input type="password" name="senha" class="form-control h-56-px bg-neutral-50 radius-12" id="senha" placeholder="Senha" required>
                    </div>
                </div>

                <!-- Confirmação de Senha -->
                <div class="position-relative mb-16">
                    <div class="icon-field">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                        </span>
                        <input type="password" name="senha_confirmation" class="form-control h-56-px bg-neutral-50 radius-12" id="confirmar-senha" placeholder="Confirme a Senha" required>
                    </div>
                </div>

                <!-- Termos e Condições -->
                <div class="form-check style-check d-flex align-items-start mb-20">
                    <input class="form-check-input border border-neutral-300 mt-1" type="checkbox" value="" id="termos" required>
                    <label class="form-check-label text-sm" for="termos">
                        Ao criar uma conta, você concorda com os
                        <a href="javascript:void(0)" class="text-primary-600 fw-semibold">Termos e Condições</a> e nossa
                        <a href="javascript:void(0)" class="text-primary-600 fw-semibold">Política de Privacidade</a>.
                    </label>
                </div>

                <!-- Botão de Cadastro -->
                <button type="submit" class="btn btn-success text-sm btn-sm px-12 py-16 w-100 radius-12">Cadastrar</button>

                <!-- Cadastro com Redes Sociais -->
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

                <!-- Link para Login -->
                <div class="mt-32 text-center text-sm">
                    <p class="mb-0">Já possui uma conta? <a href="{{ route('signin') }}" class="text-primary-600 fw-semibold">Entrar</a></p>
                </div>
            </form>
        </div>
    </div>
</section>

<x-script />

</body>

</html>

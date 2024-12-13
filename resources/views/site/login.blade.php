@extends('layout.site')

@section('content')

    <section class="auth bg-base d-flex flex-wrap align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div class="text-center">

                    <h4 class="mb-12">Acessar sua Conta</h4>
                    <p class="mb-32 text-secondary-light text-lg">Bem-vindo de volta! Por favor, insira seus dados</p>
                </div>
                <form action="{{ route('site.login') }}" method="POST">
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

                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" name="email" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Endereço de E-mail" value="{{ old('email') }}" required>
                    </div>
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="senha" class="form-control h-56-px bg-neutral-50 radius-12" id="sua-senha" placeholder="Senha" required>


                        </div>
                        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#sua-senha"></span>
                    </div>
                    <div class="d-flex justify-content-between gap-2 mb-20">
                        <div class="form-check style-check d-flex align-items-center">
                            <input class="form-check-input border border-neutral-300" type="checkbox" name="remember" id="lembrar">
                            <label class="form-check-label" for="lembrar">Lembrar-me</label>
                        </div>
                        <a href="{{ route('forgotPassword') }}" class="text-primary-600 fw-medium">Esqueceu a senha?</a>
                    </div>

                    <button type="submit" class="btn btn-success text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">Entrar</button>

                    <div class="mt-32 center-border-horizontal text-center">
                        <span class="bg-base z-1 px-4">Ou entre com</span>
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
                        <p class="mb-0">Não tem uma conta? <a href="{{ route('site.viewregister') }}" class="text-primary-600 fw-semibold">Crie sua conta</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
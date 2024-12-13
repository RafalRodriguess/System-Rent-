<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
    @include('components.head') <!-- Inclui o arquivo com o head -->
</head>
<body>
    <!-- Header -->
    @include('components.headersite') <!-- Inclui o cabeçalho do site -->

    <!-- Main Content -->
    <main>
        @yield('content') <!-- Aqui será inserido o conteúdo específico de cada página -->
    </main>

    <!-- Footer -->
    @include('components.footersite') <!-- Inclui o rodapé do site -->

    <!-- Scripts -->
    @include('components.script') <!-- Inclui o arquivo com os scripts -->
</body>
</html>

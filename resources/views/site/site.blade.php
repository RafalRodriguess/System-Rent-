@extends('layout.site')
@section('content')

        <section class="hero-section hero-1 fix">
            <div class="array-button">
                <button class="image-array-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="image-array-right">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
            <div class="swiper hero-slider">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="hero-image bg-cover" style="background-image: url('{{ asset('assets/site/slide1.jpg') }}');">
                            <div class="overlay-shape">
                                <img src="{{ asset('assets/site/overlay.png') }}" alt="imagem">
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="hero-content text-center">
                                        <h4 class="text-white" data-animation="fadeInUp" data-delay="1.3s">
                                            <!-- Título 4 do slide -->
                                        </h4>
                                        <h1 class="text-white" data-animation="fadeInUp" data-delay="1.3s">
                                            <span></span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="hero-image bg-cover" style="background-image: url('{{ asset('assets/site/slide2.png') }}');">
                            <div class="overlay-shape">
                                <img src="{{ asset('assets/site/overlay.png') }}" alt="imagem">
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="hero-content text-center">
                                        <h4 class="text-white" data-animation="fadeInUp" data-delay="1.3s">
                                            <!-- Título 4 do slide -->
                                        </h4>
                                        <h1 class="text-white" data-animation="fadeInUp" data-delay="1.3s">
                                            <span></span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="hero-image bg-cover" style="background-image: url('{{ asset('assets/site/slide3.gif') }}');">
                            <div class="overlay-shape">
                                <img src="{{ asset('assets/site/overlay.png') }}" alt="imagem">
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="hero-content text-center">
                                        <h4 class="text-white" data-animation="fadeInUp" data-delay="1.3s">
                                            <!-- Título 4 do slide -->
                                        </h4>
                                        <h1 class="text-white" data-animation="fadeInUp" data-delay="1.3s">
                                            <span></span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="hero-image bg-cover" style="background-image: url('{{ asset('assets/site/slide4.jpg') }}');">
                            <div class="overlay-shape">
                                <img src="{{ asset('assets/site/overlay.png') }}" alt="imagem">
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="hero-content text-center">
                                        <h4 class="text-white" data-animation="fadeInUp" data-delay="1.3s">
                                            <!-- Título 4 do slide -->
                                        </h4>
                                        <h1 class="text-white" data-animation="fadeInUp" data-delay="1.3s">
                                            <span></span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="swiper-slide">
                        <div class="hero-image bg-cover" style="background-image: url('{{ asset('assets/site/slide5.jpg') }}');">
                            <div class="overlay-shape">
                                <img src="{{ asset('assets/site/overlay.png') }}" alt="imagem">
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="hero-content text-center">
                                        <h4 class="text-white" data-animation="fadeInUp" data-delay="1.3s">
                                            <!-- Título 4 do slide -->
                                        </h4>
                                        <h1 class="text-white" data-animation="fadeInUp" data-delay="1.3s">
                                            <span></span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Seção de Localização de Retirada Início -->
        <div class="pickup-loaction-area bg-cover" style="background-image: {{asset ('assets/site/img/brand-bg.png' )}};">
            <div class="container">
                <div class="pickup-wrapper wow fadeInUp" data-wow-delay=".4s">
                    <div class="pickup-items">
                        <label class="field-label">Local de Retirada</label>
                        <div class="category-oneadjust">
                            <select name="cate" class="category">
                                <option value="1">
                                    Selecione a Localização
                                </option>
                                <option value="1">
                                    Houston
                                </option>
                                <option value="1">
                                    Texas
                                </option>
                                <option value="1">
                                    Nova York
                                </option>
                                <option value="1">
                                    Outra Localização
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="pickup-items">
                        <label class="field-label">Data de Retirada</label>
                        <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                            <input class="form-control" type="text" placeholder="Check-in" readonly>
                            <span class="input-group-addon"> <i class="fa-solid fa-calendar-days"></i></span>
                        </div>
                    </div>
                    <div class="pickup-items">
                        <label class="field-label">Data de Devolução</label>
                        <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
                            <input class="form-control" type="text" placeholder="Check-in" readonly>
                            <span class="input-group-addon"> <i class="fa-solid fa-calendar-days"></i></span>
                        </div>
                    </div>
                    <div class="pickup-items">
                        <label class="field-label">Tipo de Carro</label>
                        <div class="category-oneadjust">
                            <select name="cate" class="category">
                                <option value="1">
                                    Carros
                                </option>
                                <option value="1">
                                    Sedan
                                </option>
                                <option value="1">
                                    Esportivo
                                </option>
                                <option value="1">
                                    Jipe
                                </option>
                                <option value="1">
                                    Limusine
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="pickup-items">
                        <label class="field-label style-2">Botão</label>
                        <button class="pickup-btn" type="submit">
                            Encontrar um Carro
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Seção de Benefícios Início -->
        <section class="feature-benefit section section-padding fix">
            <div class="container">
                <div class="section-title text-center">
                    <img src="{{ asset('assets/images/localiza.png') }}" alt="logo-img">
                    <span class="wow fadeInUp" data-wow-delay=".2s">Benefícios</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">
                        Por Que Você Deveria Usar <br>
                        Os Carros da Localiza
                    </h2>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="feature-benefit-items">
                            <div class="icon-box-shape">
                                <img src="{{ asset('assets/site/img/feature-benefit/box-icon-bg1.png') }}" alt="shape-img">
                            </div>
                            <div class="bg-button-shape">
                                <img src="{{ asset('assets/site/img/feature-benefit/bg-button-iconbox.png') }}" alt="shape-img">
                            </div>
                            <div class="feature-content">
                                <h4>
                                    <a href="#">
                                        Reservas Mais Fáceis & <br>
                                        Rápidas
                                    </a>
                                </h4>
                                <p>Neque porro quisquam est, qui fre dolorem ipsum quia dolor.</p>
                                <div class="icon">
                                    <img src="{{ asset('assets/site/icon-1.webp') }}" alt="logo-img">
                                </div>
                            </div>
                            <div class="feature-button">
                                <a href="#" class="link-btn">Ver Mais <i class="fa-solid fa-arrow-right ps-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="feature-benefit-items">
                            <div class="icon-box-shape">
                                <img src="{{asset('assets/site/img/feature-benefit/box-icon-bg2.png')  }}" alt="shape-img">
                            </div>
                            <div class="bg-button-shape">
                                <img src="{{ asset('assets/site/img/feature-benefit/bg-button-iconbox.png') }}" alt="shape-img">
                            </div>
                            <div class="feature-content">
                                <h4>
                                    <a href="#">
                                        Muitas <br>
                                        Localizações de Retirada
                                    </a>
                                </h4>
                                <p>Neque porro quisquam est, qui fre dolorem ipsum quia dolor.</p>
                                <div class="icon">
                                    <img src="{{ asset('assets/site/icon-2.webp') }}" alt="logo-img">
                                </div>
                            </div>
                            <div class="feature-button">
                                <a href="#" class="link-btn">Ver Mais <i class="fa-solid fa-arrow-right ps-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="feature-benefit-items">
                            <div class="icon-box-shape">
                                <img src="{{ asset('assets/site/img/feature-benefit/box-icon-bg3.png') }}" alt="shape-img">
                            </div>
                            <div class="bg-button-shape">
                                <img src="assets/site/img/feature-benefit/bg-button-iconbox.png" alt="shape-img">
                            </div>
                            <div class="feature-content">
                                <h4>
                                    <a href="#">
                                        Clientes <br>
                                        100% Satisfeitos
                                    </a>
                                </h4>
                                <p>Neque porro quisquam est, qui fre dolorem ipsum quia dolor.</p>
                                <div class="icon">
                                    <img src="{{ asset('assets/site/icon-3.webp') }}" alt="logo-img">
                                </div>
                            </div>
                            <div class="feature-button">
                                <a href="#" class="link-btn">Ver Mais <i class="fa-solid fa-arrow-right ps-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Seção Sobre Início -->
        <section class="about-section fix section-padding pt-0">
            <div class="container">
                <div class="about-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="about-image-items">
                                <div class="color-shape">
                                    <img src="{{ asset('assets/site/img/about/secondary-shape-color-full.png') }}" alt="shape-img">
                                </div>
                                <div class="car-shape wow fadeInUp" data-wow-delay=".7s">
                                    <img src="{{ asset('assets/site/car-shape.webp') }}" alt="logo-img">
                                </div>
                                <div class="counter-content wow fadeInLeft" data-wow-delay=".4s">
                                    <h2 class="text-white"><span class="count">50</span></h2>
                                    <p class="text-white">
                                        Anos de <br>
                                        Experiência
                                    </p>
                                </div>
                                <div class="about-image-1 wow fadeInDown" data-wow-delay=".3s">
                                    <img src="{{ asset('assets/site/about1.webp') }}" alt="about-image">
                                </div>
                                <div class="about-image-2 wow fadeInLeft" data-wow-delay=".5s">
                                    <img src="{{ asset('assets/site/about2.webp') }}" alt="about-image">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-title">
                                    <img src="{{ asset('assets/images/localiza.png') }}" alt="icon-img" class="wow fadeInUp">
                                    <span class="wow fadeInUp" data-wow-delay=".2s">Conheça-nos</span>
                                    <h2 class="wow fadeInUp" data-wow-delay=".4s">
                                        Serviços com uma Grande
                                        Variedade de Carros
                                    </h2>
                                </div>
                                <h4 class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".3s">
                                    Comprometidos em fornecer serviços excepcionais aos nossos clientes.
                                </h4>
                                <p class="wow fadeInUp" data-wow-delay=".5s">
                                    Lorem ipsum é simplesmente texto de preenchimento da indústria tipográfica e de impressão.
                                </p>
                                <div class="about-list-item wow fadeInUp" data-wow-delay=".7s">
                                    <ul>
                                        <li>
                                            Muitas Localizações de Retirada
                                        </li>
                                        <li>
                                            Oferecendo Preços Baixos
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            Muitas Localizações de Retirada
                                        </li>
                                        <li>
                                            Oferecendo Preços Baixos
                                        </li>
                                    </ul>
                                </div>
                                <a href="#" class="theme-btn wow fadeInUp" data-wow-delay=".8s">Descubra Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!-- Seção de Aluguel de Carros -->
<section class="car-rentals-section section-padding fix">
    <div class="container">
        <div class="section-title text-center">
            <img src="{{ asset('assets/images/localiza.png') }}" alt="icon-img" class="wow fadeInUp">
            <span class="wow fadeInUp" data-wow-delay=".2s">Confira nossos novos carros</span>
            <h2 class="wow fadeInUp" data-wow-delay=".4s">Carros que Estamos Oferecendo para Aluguel</h2>
        </div>
    </div>

    <div class="swiper car-rentals-slider">
        <div class="swiper-wrapper" id="car-list">
            @foreach($veiculos as $veiculo)
            <div class="swiper-slide">
                <div class="car-rentals-items">
                    <div class="car-image">
                        <img src="{{ asset('storage/' . $veiculo->imagem) }}" alt="{{ $veiculo->nome }}">
                    </div>
                    <div class="car-content">
                        <div class="post-cat">Modelo {{ $veiculo->ano }}</div>
                        <h4>{{ $veiculo->marca }} {{ $veiculo->modelo }}</h4>
                        <h6>R$ {{ number_format($veiculo->valor_diaria, 2, ',', '.') }} <span>/ Dia</span></h6>
                        <div class="icon-items">
                            <ul>
                                <li><img src="assets/site/img/car/seat.svg" alt="Assentos">{{ $veiculo->assentos }} Assentos</li>
                                <li><img src="assets/site/img/car/door.svg" alt="Portas">{{ $veiculo->portas }} Portas</li>
                                <li><img src="assets/site/img/car/ac.svg" alt="Ar Condicionado">{{ $veiculo->ar_condicionado ? 'Sim' : 'Não' }}</li>
                            </ul>
                        </div>
                        <p>Garantia: R$ {{ number_format($veiculo->caucao, 2, ',', '.') }}</p>
                        <a href="#" class="theme-btn bg-color w-100 text-center" 
                           data-bs-toggle="modal" 
                           data-bs-target="#modalAluguel" 
                           onclick="openReserveModal({{ $veiculo->id }}, '{{ $veiculo->modelo }}', {{ $veiculo->valor_diaria }})">
                            Reserve agora <i class="fa-solid fa-arrow-right ps-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Modal de Aluguel -->
<div class="modal fade" id="modalAluguel" tabindex="-1" aria-labelledby="modalAluguelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAluguelLabel">Reservar Veículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('site.aluguel.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="cliente_id" value="{{ auth()->guard('clientes')->id() }}">
                    <input type="hidden" name="veiculo_id" id="veiculo_id">
                    <input type="hidden" name="status" value="pendente">

                    <div class="mb-3">
                        <label for="veiculo_nome" class="form-label">Veículo</label>
                        <input type="text" id="veiculo_nome" class="form-control" readonly>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="data_inicio" class="form-label">Data Início</label>
                            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="data_fim" class="form-label">Data Fim</label>
                            <input type="date" name="data_fim" id="data_fim" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="valor_diaria" class="form-label">Valor Diária</label>
                            <p id="valor_diaria" class="form-control-plaintext">R$ 0,00</p>
                        </div>
                        <div class="col-md-6">
                            <label for="valor_total" class="form-label">Valor Total</label>
                            <p id="valor_total" class="form-control-plaintext">R$ 0,00</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success w-100">Confirmar Reserva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Customização para o modal */
    #modalAluguel .modal-dialog {
        margin-top: 5rem; /* Distância do topo */
    }
</style>

<script>
    function openReserveModal(id, modelo, diaria) {
        document.getElementById('veiculo_id').value = id;
        document.getElementById('veiculo_nome').value = modelo;
        document.getElementById('valor_diaria').innerText = `R$ ${diaria.toFixed(2)}`;
        const calcularTotal = () => {
            const inicio = new Date(document.getElementById('data_inicio').value);
            const fim = new Date(document.getElementById('data_fim').value);
            const dias = (fim - inicio) / (1000 * 3600 * 24) + 1;
            document.getElementById('valor_total').innerText = `R$ ${(dias * diaria).toFixed(2)}`;
        };
        document.getElementById('data_inicio').addEventListener('change', calcularTotal);
        document.getElementById('data_fim').addEventListener('change', calcularTotal);
    }
</script>
@endsection
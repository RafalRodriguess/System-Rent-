<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('index') }}" class="sidebar-logo">
            <img src="{{ asset('assets/images/localiza.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/images/localiza-logo.svg') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('assets/images/favicon.jpeg') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Aluguéis -->
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="fa-solid:car" class="menu-icon"></iconify-icon>
                    <span>Aluguéis</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('index') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Listagem de Aluguéis</a>
                    </li>
                    <li>
                        <a href="#"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Adicionar Aluguel</a>
                    </li>
                </ul>
            </li>

            <!-- Veículos -->
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:car-multiple" class="menu-icon"></iconify-icon>
                    <span>Veículos</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('veiculos.index') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Listagem de Veículos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('veiculos.create') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Adicionar Veículo
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Relatórios -->
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="carbon:report" class="menu-icon"></iconify-icon>
                    <span>Relatórios</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="#"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Relatório de Aluguéis</a>
                    </li>
                    <li>
                        <a href="#"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Relatório de Veículos</a>
                    </li>
                    <li>
                        <a href="#"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i> Relatório Financeiro</a>
                    </li>
                </ul>
            </li>

            <!-- Users -->
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('users.index') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Listagem de Usuários</a>
                    </li>
                </ul>
            </li>

            <!-- Configurações -->
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>Configurações</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="#"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Geral</a>
                    </li>
                    <li>
                        <a href="#"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Notificações</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

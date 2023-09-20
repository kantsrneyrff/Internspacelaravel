<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Logo do site -->
    <a class="navbar-brand ps-md-3 me-md-5 order-md-1 order-2" href="{{route('painel-index')}}"><img src="/img/Logo_Light.png" width="150"></a>

    <!-- Botão sidebar -->
    <button class="btn btn-link btn-sm mx-2 mx-md-4 me-auto order-md-2 order-1" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    
    <!-- Temporizador -->
    <form id="navbar-temporizador" class="d-none d-md-inline-block ms-md-auto form-inline order-md-3">
        <div style=" color:#AA48E5; font-weight: bold;" id="temporizador"></div>
    </form>

    <!-- Botão usuário -->
    <ul class="navbar-nav ms-md-2 ms-auto me-3 order-md-4 order-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('perfil-index')}}">Configurar Pefil</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="{{route('logout')}}">Sair</a></li>
            </ul>
        </li>
    </ul>
</nav>
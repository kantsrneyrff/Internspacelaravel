<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{route('painel-index')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></i></div>
                    Painel
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-days"></i></i></div>
                    Agendamentos
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('confirmAgendamentos-index')}}">Aprovar/Recusar Agendamento</a>
                        <!-- <a class="nav-link" href="cadastroAgendamento">Cadastrar</a> -->
                        <a class="nav-link" href="{{route('agendamentos-index')}}">Pesquisar</a>
                        <a class="nav-link" href="{{route('parametros-createOrEdit')}}">Parâmetros de Agend.</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Usuários
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="{{route('usuarios-index')}}">Pesquisar</a>
                        <a class="nav-link" href="{{route('usuarios-create')}}">Cadastrar</a>
                    </nav>
                </div>
            </div>
        </div>
        <div id="sidebar-footer" class="sb-sidenav-footer">
            <div class="small">{{auth()->user()->nome}}</div>
            {{$cargo}}
        </div>
    </nav>
</div>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="/img/Icon_Light.png">
    <link href="/css/style.css" rel="stylesheet" />
    <link href="/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />
    @yield('head')
    <title>@yield('title') - InternSpace</title><!----Titulo das Páginas---->
</head>

<body class="sb-nav-fixed">
    <!---NAV BAR-->
    @component('components.nav')
    @endcomponent
    <!---Linha importantante abaixo-->
    <div id="layoutSidenav">
        <!--------------SIDE----------------->
        @switch(Auth::user()->cargo)
        @case('adm')
        @component('components.sidebarAdm',['user' => Auth::user(), 'cargo' => 'Administrador(a)'])@endcomponent
        @break
        @case('prof')
        @component('components.sidebarOrientador',['user' => Auth::user(), 'cargo' => 'Professor(a)'])@endcomponent
        @break
        @case('aluno')
        @component('components.sidebarUsuario',['user' => Auth::user(), 'cargo' => 'Aluno'])@endcomponent
        @break
        @endswitch
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4 mb-4">@yield('title')</h1>
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/js/temporizadorLogout.js"></script>
    <script src="/js/painel.js"></script>
    @yield('scripts')
</body>

</html>
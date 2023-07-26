@extends('layouts.template')


@section('title', 'Painel')

@section('content')

<!---- css necessario para a pagina ---->

<body class="sb-nav-fixed">

    <!--NAV -->
    @component('components.nav')
    @endcomponent

    <!---Linha importante abaixo-->
    <div id="layoutSidenav">
        <!---------------SIDE---------------->
        @component('components.sidebarUsuario')
        @endcomponent
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="painelAdm">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cadastro Usuário</li>
                    </ol>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                        <!--- resto do conteudo da pagina ---->



        @endsection
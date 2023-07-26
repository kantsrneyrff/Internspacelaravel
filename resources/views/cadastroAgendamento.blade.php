@extends('layouts.template')


@section('title', 'Agendamento')

@section('content')

<link rel="stylesheet" href="/css/agendamento.css">

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

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
                    <h1 class="mt-4">Cadastro agendamento</h1>
                    <ol class="breadcrumb mb-4">

                        <li class="breadcrumb-item"><a href="painelAdm">Dashboard</a></li>
                        <li class="breadcrumb-item active">Agendamentos</li>
                        <li class="breadcrumb-item active">Solicitar</li>
                    </ol>

                    <!-- Cartão de agendamento -->
                    <div class="card">
                        <div class="card-header">
                            Agendar vaga
                        </div>
                        <form method="POST">
                            <div class="container-agendamento">
                                <div class="form-group col">

                                    <div class="select-container">   
                                        <label>Hotel</label>
                                        <select id="hotel" name="hotel" class="form-select" onchange="limitarSetores()" aria-label="Default select example">
                                            <option selected>Selecione</option>
                                            <option value="HOTEL - BELA VISTA">HOTEL - BELA VISTA</option>
                                            <option value="HOTEL - VILA BUSINESS">HOTEL - VILA BUSINESS</option>
                                        </select>  
                                        <label>Setor</label>
                                        <select id="setor" name="setor" class="form-select" aria-label="Default select example">
                                            <option selected>Selecione</option>
                                            <option value="Barman">Barman</option>
                                            <option value="Cozinha">Cozinha</option>
                                            <option value="Garçom">Garçom</option>
                                            <option value="Governança">Governança</option>
                                            <option value="Recepção">Recepção</option>
                                        </select>
                                        <label>Período</label>
                                        <select name="periodo" class="form-select" aria-label="Default select example">
                                            <option selected>Selecione</option>
                                            <option value="manha">Manhã</option>
                                            <option value="tarde">Tarde</option>
                                            <option value="integral">Integral</option>
                                        </select>
                                      
                                     
                                    </div>
                                    <label id="DataSelecionada" for="DataSelecionada">Data Selecionada:</label>
                                    <br>
                                    <input name="data" id="data" type="text" required readonly>
                                    <div class="asdhfgdskhfgkhg">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Agendar</button>
                                    </div>
                                </div>


                                <div class="calendar col">
                                    <div class="calendar-header">
                                        <!-- BOTÃO DO MÊS -->
                                        <button class="btn btn-outline-info btn-lg" type="button" id="month-picker"></button>
                                        <div class="year-picker">
                                            <span id="year"></span>
                                        </div>
                                    </div>


                                    <div class="calendar-body">
                                        <div class="calendar-week-day">
                                            <div>D</div>
                                            <div>S</div>
                                            <div>T</div>
                                            <div>Q</div>
                                            <div>Q</div>
                                            <div>S</div>
                                            <div>S</div>
                                        </div>
                                        <div class="calendar-days">
                                        </div>
                                    </div>


                                    <div class="calendar-footer">
                                        <div class="legend">

                                            <div class="calendar-footer-item">
                                                <div class="circle disponivel"></div>
                                                <span>Disponível</span>
                                            </div>

                                            <div class="calendar-footer-item">
                                                <div class="circle cheio"></div>
                                                <span>Cheio</span>
                                            </div>

                                            <div class="calendar-footer-item">
                                                <div class="circle indisponivel"></div>
                                                <span>Indisponível</span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card month-list p-3 d-flex position-fixed"></div>
                                </div>  
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="/js/agendamento.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
</body>
<?php /*$this->view('includes/footer');*/ ?>

</html>
@endsection
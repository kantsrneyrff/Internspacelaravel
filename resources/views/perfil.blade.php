@extends('layouts.template')


@section('title', 'Perfil')

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
                <div class="container-fluid px-3">

                    <h1 class="mt-4">Perfil</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="painelAdm">Dashboard</a></li>
                        <li class="breadcrumb-item active">Aluno</li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                    <!-- Perfil -->
                    <div class="d-flex mt-4 w-100 flex-md-row flex-column">


                        <!-- Cartão 1 -->
                        <div class="card p-4 m-2" style="min-width: 30%">
                            <div class="d-flex flex-column justify-content-center">


                                <div class="d-flex justify-content-center my-4 flex-row">
                                    <img src="../public/assets/img/fundo-pessoas-trabalhando.png" alt="Profile Picture" class="rounded-circle" style="max-width: 200px;">
                                </div>



                                <div class="d-flex flex-col justify-content-center text-center align-items-center mx-4">
                                    <div class="profile-details">
                                        <h3 style="text-transform: uppercase;">
                                            <b>
                                                
                                            </b>
                                        </h3>
                                        <h5>
                                        
                                        </h5>
                                    </div>
                                </div>


                                <div class="d-flex flex-col justify-content-center text-center align-items-center my-3 mb-5">

                                    <button class="btn btn-outline-secondary mx-2" type="button" onclick="mostrarEditarDados(this)" id="btn-perfil-dados" style="border-radius: 100px">Editar dados</button>
                                    <button class="btn btn-outline-secondary mx-2" type="button" onclick="mostrarAlterarFoto(this)" id="btn-perfil-foto" style="border-radius: 100px">Alterar foto</button>

                                </div>









                                <div class="d-flex flex-col justify-content-start text-start align-items-center">
                                    <div>
                                        <h5><b>CONTATO</b></h5>
                                        <div class="profile-contact-email my-4">

                                            <h6><b>Email</b></h6>
                                            <span>
                                               
                                            </span>

                                        </div>

                                        <div class="profile-contact-phone my-4">
                                            <h6><b>Telefone</b></h6>
                                            <span></span>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>



                        <!-- Cartão 2 -->
                        <div class="card p-4 m-2 flex-wrap text-nowrap flex-column flex-grow-1">

                            <div class="d-flex flex-col align-items-center m-2">
                                <div class="profile-details">
                                    <h5><b>DATA DE NASCIMENTO</b></h5>
                                    <h6></h6>
                                </div>
                            </div>


                            <div class="d-flex flex-col align-items-center m-2">
                                <div class="profile-details">
                                    <h5><b>ESTADO</b></h5>
                                    <h6></h6>
                                </div>
                            </div>


                            <div class="d-flex flex-col align-items-center m-2">
                                <div class="profile-details">
                                    <h5><b>CIDADE</b></h5>
                                    <h6></h6>
                                </div>
                            </div>


                            <div class="d-flex flex-col align-items-center m-2">
                                <div class="profile-details">
                                    <h5><b>BAIRRO</b></h5>
                                    <h6></h6>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>






                <!-- Modal -->
                <div class="modal fade" id="modal-dados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar dados</h5>
                                <button type="button" class="btn btn-secondary close" onclick="$('#modal-dados').modal('hide')" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    boua<br><br>

                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="acao" value="1">
                                    <strong> Nome: </strong><input type="text" id="nome" disabled=""><br>
                                    <strong>Data </strong><input type="text" id="data" disabled=""><br>
                                    <strong>Período: </strong><input type="text" id="periodo" disabled=""><br>
                                    <strong>Local: </strong><input type="text" id="local" disabled=""><br>
                                    <strong>Setor: </strong><input type="text" id="setor" disabled="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="$('#modal-dados').modal('hide')">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>







                <!-- Modal -->
                <div class="modal fade" id="modal-foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Alterar foto de perfil</h5>
                                <button type="button" class="btn btn-secondary close" onclick="$('#modal-foto').modal('hide')" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">

                                    <div class="py-5 align-items-center justify-content-center text-center">
                                        <span>bom dia vamos trocar a foto</span>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="$('#modal-foto').modal('hide')">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </main>
        </div>


    </div>




</body>
<script type="text/javascript">
    function mostrarEditarDados(e) {

        $(document).ready(function() {
            $('#modal-dados').modal('show');
        });
    }

    function mostrarAlterarFoto(e) {

        $(document).ready(function() {
            $('#modal-foto').modal('show');
        });
    }
</script>
<?php //$this->view('includes/footer'); 
?>




@endsection
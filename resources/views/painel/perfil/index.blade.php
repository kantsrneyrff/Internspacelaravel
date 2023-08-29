@extends('layouts.template')

@section('title', 'Perfil')

@section('head')
<link rel="stylesheet" href="/css/perfil.css">

@endsection

@section('content')

<div class="d-flex mt-4 w-100 flex-md-row flex-column">

<div class="card p-4 m-2" style="min-width: 30%">
    <div class="d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-center my-4 flex-row">
            <img src="/img/fundo-pessoas-trabalhando.png" alt="Profile Picture" class="rounded-circle" style="max-width: 200px;">
        </div>
        <div class="d-flex flex-col justify-content-center text-center align-items-center mx-4">
            <div class="profile-details">
                <h3 style="text-transform: uppercase;">
                    <b>
                        {{auth()->user()->nome}}
                    </b>
                </h3>
                <h5>
                    {{auth()->user()->cargo}}
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
                    <h6><b></b></h6>
                    <span>
                    <h6><b>Email</b></h6>
                    <span>{{auth()->user()->email}}</span>

                    </span>
                </div>
                <div class="profile-contact-phone my-4">
                    <h6><b>Telefone</b></h6>
                    <span>{{auth()->user()->telefone}}</span>
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
            <h6>{{date('d/m/Y', strtotime(auth()->user()->dataNascimento))}}</h6>
        </div>
    </div>
    <div class="d-flex flex-col align-items-center m-2">
        <div class="profile-details">
            <h5><b>ESTADO</b></h5>
            <h6>{{auth()->user()->uf}}</h6>
        </div>
    </div>
    <div class="d-flex flex-col align-items-center m-2">
        <div class="profile-details">
            <h5><b>CIDADE</b></h5>
            <h6>{{auth()->user()->cidade}}</h6>
        </div>
    </div>
    <div class="d-flex flex-col align-items-center m-2">
        <div class="profile-details">
            <h5><b>BAIRRO</b></h5>
            <h6>{{auth()->user()->bairro}}</h6>
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
                    <strong>Nome:</strong><input type="text" id="nome" disabled=""><br>
                    <strong>Data:</strong><input type="text" id="data" disabled=""><br>
                    <strong>Período:</strong><input type="text" id="periodo" disabled=""><br>
                    <strong>Local:</strong><input type="text" id="local" disabled=""><br>
                    <strong>Setor:</strong><input type="text" id="setor" disabled="">
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
</div>


</div>
</div>



@section('scripts')

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


@endsection
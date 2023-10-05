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
                <img src="/img/People_Icon_Mono.svg" alt="Profile Picture" style="min-width: 200px; color: black;">
            </div>
            <div class="d-flex flex-col justify-content-center text-center align-items-center mx-4">
                <div class="profile-details">
                    <h3 style="text-transform: uppercase;"><b>{{auth()->user()->nome}}</b></h3>
                    <h5>{{auth()->user()->cargo}}</h5>
                </div>
            </div>
            <div class="d-flex flex-col justify-content-center text-center align-items-center my-3 mb-5">
                <!-- <button class="btn btn-outline-secondary mx-2" type="button" onclick="mostrarAlterarFoto(this)" id="btn-perfil-foto" style="border-radius: 100px">Alterar foto</button> -->
            </div>
            <div class="d-flex flex-col justify-content-start text-start align-items-center">
                <div>
                    <h5><b>CONTATO</b></h5>
                    <div class="profile-contact-email my-4">
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
    <div class="card p-4 m-2 flex-grow-1">
        <div class="row">
            <div class="col-md-6">
                <h5><b>Dados Cadastrais</b></h5>
                <div class="my-4">
                    <h6><b>CPF</b></h6>
                    <span>{{auth()->user()->cpf}}</span>
                </div>
                <div class="my-4">
                    <span>
                        <h6><b>Identidade</b></h6>
                        <span>{{auth()->user()->rg}}</span>
                    </span>
                </div>
                <div class="my-4">
                    <h6><b>Gênero</b></h6>
                    <span>{{auth()->user()->genero}}</span>
                </div>
                <div>
                    <h6><b>Data de Nascimento</b></h6>
                    <span>{{date('d/m/Y', strtotime(auth()->user()->dataNascimento))}}</span>
                </div>
            </div>
            <hr class="my-4 divider">
            <div class="col-md-6">
                <h5><b>Dados de Endereço</b></h5>
                <div class="my-4">
                    <span>
                        <h6><b>CEP</b></h6>
                        <span>{{auth()->user()->cep}}</span>
                    </span>
                </div>
                <div class="my-4">
                    <h6><b>Endereço</b></h6>
                    <span>{{auth()->user()->logradouro}}</span>
                </div>
                <div class="my-4">
                    <h6><b>Número</b></h6>
                    <span>{{auth()->user()->numero}}</span>
                </div>
                <div class="my-4">
                    <h6><b>Complemento</b></h6>
                    <span>{{auth()->user()->complemento}}</span>
                </div>
                <div class="my-4">
                    <h6><b>Bairro</b></h6>
                    <span>{{auth()->user()->bairro}}</span>
                </div>
                <div class="my-4">
                    <h6><b>Cidade</b></h6>
                    <span>{{auth()->user()->cidade}}</span>
                </div>
                <div class="my-4">
                    <h6><b>Estado</b></h6>
                    <span>{{auth()->user()->uf}}</span>
                </div>
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
                            <span>Essa funcionalidade está fora do ar no momento. Tente novamente em breve.</span>
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
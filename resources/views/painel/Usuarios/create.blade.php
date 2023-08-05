@extends('layouts.template')

@section('title', 'Cadastro Usuário')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('usuarios-store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nome:</label>
                            <input type="text" class="form-control" value="{{old('nome')}}" name="nome">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Data de Nascimento:</label>
                            <input type="date" class="form-control" value="{{old('dataNascimento')}}" name="dataNascimento">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Gênero:</label>
                            <select name="genero" class="form-select">
                                <option value="">Selecione</option>
                                <option value="F" {{ "Feminio" == old('genero') ? 'selected' : '' }}>Feminio</option>
                                <option value="M" {{ "Masculino" == old('genero') ? 'selected' : '' }}>Masculino</option>
                                <option value="O" {{ "Outros" == old('genero') ? 'selected' : '' }}>Outros</option>
                                <option value="ND" {{ "Não Informar" == old('genero') ? 'selected' : '' }}>Não Informar</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>CPF:</label>
                            <input type="text" class="form-control" name="cpf" id="cpf">
                        </div>
                        <div class="form-group col-md-3">
                            <label>RG:</label>
                            <input type="text" class="form-control" name="documento">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Telefone:</label>
                            <input type="text" class="form-control" id="telefone" name="telefone">
                        </div>
                        <div class="form-group col-md-3">
                            <label>CEP:</label>
                            <input type="text" class="form-control" id="cep" name="cep">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="endereco">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" name="complemento" id="complemento">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="numero">Número:</label>
                            <input type="text" class="form-control" name="numero" id="numero">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" name="bairro" id="bairro">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" name="cidade" id="cidade">
                        </div>
                        <div class="form-group col-md-5">
                            <label>UF:</label>
                            <select name="uf" class="form-select">
                                <option value="">Selecione</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espirito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label>E-mail:</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Senha:</label>
                            <input type="password" name="senha" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Confirmar Senha:</label>
                            <input type="password" name="senha2" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Cargo:</label>
                            <select name="cargo" class="form-select">
                                <option value=''>Selecione</option>
                                <option value='Administrador'>Administrador</option>
                                <option value='Aluno'>Aluno</option>
                                <option value='Orientador'>Orientador</option>
                            </select>
                        </div>
                    </div>
                    <div class="container-btn mt-2">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <a href="{{route('usuarios-index')}}" class="btn btn-secondary">Cancelar</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
<script>
    $(document).ready(function () { 
        $("#cpf").mask('000.000.000-00');
        $("#cep").mask('00000-000');

        var behavior = function(val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {
            onKeyPress: function(val, e, field, options) {
                field.mask(behavior.apply({}, arguments), options);
            }
        };
    $('#telefone').mask(behavior, options);
    });
</script>
@endsection
@endsection
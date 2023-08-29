@extends('layouts.template')

@section('title', 'Cadastrar Usuário')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('usuarios-store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome_tesgte:</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" value="{{old('nome')}}" id="nome" name="nome">
                            @error('nome')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="dataNascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control  @error('dataNascimento') is-invalid @enderror" value="{{old('dataNascimento')}}" value="{{old('dataNascimento')}}" id="dataNascimento" name="dataNascimento">
                            @error('dataNascimento')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="genero">Gênero:</label>
                            <select class="form-select" id="genero" name="genero">
                                <option value="">Selecione</option>
                                <option value="F" {{ "F" == old('genero') ? 'selected' : '' }}>Feminio</option>
                                <option value="M" {{ "M" == old('genero') ? 'selected' : '' }}>Masculino</option>
                                <option value="O" {{ "O" == old('genero') ? 'selected' : '' }}>Outros</option>
                                <option value="ND" {{ "ND" == old('genero') ? 'selected' : '' }}>Não Informar</option>
                            </select>
                        </div>
                    </div>
                    <div class="row d-flex flex-row ">
                        <div class="form-group col-md-3">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control @error('cpf') is-invalid @enderror" value="{{old('cpf')}}" id="cpf" name="cpf">
                            @error('cpf')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rg">RG:</label>
                            <input type="text" class="form-control" value="{{old('rg')}}" id="rg" name="rg">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefone">Telefone:</label>
                            <input type="text" class="form-control  @error('telefone') is-invalid @enderror" value="{{old('telefone')}}" id="telefone" name="telefone">
                            @error('telefone')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="cep">CEP:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{old('cep')}}" id="cep" name="cep">
                                <button type="button" id="cep-btn" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Linhas posteriores permanecem inalteradas -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" value="{{old('logradouro')}}" id="endereco" name="logradouro">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" value="{{old('complemento')}}" id="complemento" name="complemento">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="numero">Número:</label>
                            <input type="text" class="form-control" value="{{old('numero')}}" id="numero" name="numero">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control  @error('bairro') is-invalid @enderror" value="{{old('bairro')}}" id="bairro" name="bairro">
                            @error('bairro')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control  @error('cidade') is-invalid @enderror" value="{{old('cidade')}}" id="cidade" name="cidade">
                            @error('cidade')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label>UF:</label>
                            <select class="form-select  @error('uf') is-invalid @enderror" id="uf" name="uf">
                                <option value="">Selecione</option>
                                <option value="AC" {{ "AC" == old('uf') ? 'selected' : '' }}>Acre</option>
                                <option value="AL" {{ "AL" == old('uf') ? 'selected' : '' }}>Alagoas</option>
                                <option value="AP" {{ "AP" == old('uf') ? 'selected' : '' }}>Amapá</option>
                                <option value="AM" {{ "AM" == old('uf') ? 'selected' : '' }}>Amazonas</option>
                                <option value="BA" {{ "BA" == old('uf') ? 'selected' : '' }}>Bahia</option>
                                <option value="CE" {{ "CE" == old('uf') ? 'selected' : '' }}>Ceará</option>
                                <option value="DF" {{ "DF" == old('uf') ? 'selected' : '' }}>Distrito Federal</option>
                                <option value="ES" {{ "ES" == old('uf') ? 'selected' : '' }}>Espirito Santo</option>
                                <option value="GO" {{ "GO" == old('uf') ? 'selected' : '' }}>Goiás</option>
                                <option value="MA" {{ "MA" == old('uf') ? 'selected' : '' }}>Maranhão</option>
                                <option value="MS" {{ "MS" == old('uf') ? 'selected' : '' }}>Mato Grosso do Sul</option>
                                <option value="MT" {{ "MT" == old('uf') ? 'selected' : '' }}>Mato Grosso</option>
                                <option value="MG" {{ "MG" == old('uf') ? 'selected' : '' }}>Minas Gerais</option>
                                <option value="PA" {{ "PA" == old('uf') ? 'selected' : '' }}>Pará</option>
                                <option value="PB" {{ "PB" == old('uf') ? 'selected' : '' }}>Paraíba</option>
                                <option value="PR" {{ "PR" == old('uf') ? 'selected' : '' }}>Paraná</option>
                                <option value="PE" {{ "PE" == old('uf') ? 'selected' : '' }}>Pernambuco</option>
                                <option value="PI" {{ "PI" == old('uf') ? 'selected' : '' }}>Piauí</option>
                                <option value="RJ" {{ "RJ" == old('uf') ? 'selected' : '' }}>Rio de Janeiro</option>
                                <option value="RN" {{ "RN" == old('uf') ? 'selected' : '' }}>Rio Grande do Norte</option>
                                <option value="RS" {{ "RS" == old('uf') ? 'selected' : '' }}>Rio Grande do Sul</option>
                                <option value="RO" {{ "RO" == old('uf') ? 'selected' : '' }}>Rondônia</option>
                                <option value="RR" {{ "RR" == old('uf') ? 'selected' : '' }}>Roraima</option>
                                <option value="SC" {{ "SC" == old('uf') ? 'selected' : '' }}>Santa Catarina</option>
                                <option value="SP" {{ "SP" == old('uf') ? 'selected' : '' }}>São Paulo</option>
                                <option value="SE" {{ "SE" == old('uf') ? 'selected' : '' }}>Sergipe</option>
                                <option value="TO" {{ "TO" == old('uf') ? 'selected' : '' }}>Tocantins</option>
                            </select>
                            @error('uf')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="email" name="email">
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="passwordConfirm">Confirmar Senha:</label>
                            <input type="password" class="form-control @error('passwordConfirm') is-invalid @enderror" id="passwordConfirm" name="passwordConfirm">
                            @error('passwordConfirm')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cargo">Cargo:</label>
                            <select class="form-select @error('cargo') is-invalid @enderror" id="cargo" name="cargo">
                                <option value=''>Selecione</option>
                                <option value='adm' {{ "adm" == old('cargo') ? 'selected' : '' }}>Administrador</option>
                                <option value='aluno' {{ "aluno" == old('cargo') ? 'selected' : '' }}>Aluno</option>
                                <option value='prof' {{ "prof" == old('cargo') ? 'selected' : '' }}>Orientador</option>
                            </select>
                            @error('cargo')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
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
<script src="/js/cep.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
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
@extends('layouts.template')


@section('title', 'Cadastro')

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
                <div></div>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Cadastro Usuário</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="painelAdm">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cadastro Usuário</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">


                            <form method="POST">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" value="('nome') " name="nome" placeholder="Nome" data-sb-validations="coloque o nome">
                                        <div class="invalid-feedback" data-sb-feedback="email:required"> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>E-mail</label>
                                        <input type="email" value="('email') " name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Senha</label>
                                        <input type="password" value="('senha') " name="senha" class="form-control" placeholder="Senha">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Confirmar Senha</label>
                                        <input type="password" value="('senha2') " name="senha2" class="form-control" placeholder="Senha">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Data de Nascimento</label>
                                        <input type="date" class="form-control" value="('dataNascimento') " name="dataNascimento" placeholder="Data de Nascimento">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Gênero</label>
                                        <select name="genero" class="form-control">
                                            <option selected>Selecione..</option>
                                            <option value='Masculino'>Masculino</option>
                                            <option value='Feminino'>Feminino</option>
                                            <option value='Não Informar'>Não Informar</option>
                                            <option alue='Outros'>Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" value="('telefone') " name="telefone" placeholder="Telefone">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Cargo</label>
                                        <select name="cargo" class="form-control">
                                            <option ('cargo', '' ) value='' selected>Selecione..</option>
                                            <option ('cargo', 'Administrador' ) value='Administrador'>Administrador</option>
                                            <option ('cargo', 'Aluno' ) value='Aluno'>Aluno</option>
                                            <option ('cargo', 'Orientador' ) value='Orientador'>Orientador</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>CPF</label>
                                        <input type="text" class="form-control" value="('cpf') " name="cpf" id="cpf" placeholder="CPF">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>RG</label>
                                        <input type="text" class="form-control" value="('documento') " name="documento" placeholder="Documento">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>CEP</label>
                                        <input type="text" class="form-control" value="('cep') " name="cep">
                                    </div>
                                    <div class="form-group col-md-10">
                                        <div class="form-group col-md-10">
                                            <label for="logradouro">Logradouro</label>
                                            <input type="text" class="form-control" value="('logradouro') " name="logradouro" id="logradouro">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control" value="('numero') " name="numero" id="numero">
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control" value="('complemento') " name="complemento" id="complemento">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" value="('bairro') " name="bairro" id="bairro">
                                        <div class="form-group col-md-7">
                                            <label for="cidade">Cidade</label>
                                            <input type="text" class="form-control" value="('cidade') " name="cidade" id="cidade">
                                        </div>
                                    </div>



                                    <div class="row">
                                        <!-- UF -->
                                        <div class="form-group col-md-3">
                                            <label>UF</label>
                                            <select name="uf" class="form-control">
                                                <option ('uf', '' ) value="">Selecione</option>
                                                <option ('uf', 'AC' ) value="AC">Acre</option>
                                                <option ('uf', 'AL' ) value="AL">Alagoas</option>
                                                <option ('uf', 'AP' ) value="AP">Amapá</option>
                                                <option ('uf', 'AM' ) value="AM">Amazonas</option>
                                                <option ('uf', 'BA' ) value="BA">Bahia</option>
                                                <option ('uf', 'CE' ) value="CE">Ceará</option>
                                                <option ('uf', 'DF' ) value="DF">Distrito Federal</option>
                                                <option ('uf', 'ES' ) value="ES">Espirito Santo</option>
                                                <option ('uf', 'GO' ) value="GO">Goiás</option>
                                                <option ('uf', 'MA' ) value="MA">Maranhão</option>
                                                <option ('uf', 'MS' ) value="MS">Mato Grosso do Sul</option>
                                                <option ('uf', 'MT' ) value="MT">Mato Grosso</option>
                                                <option ('uf', 'MG' ) value="MG">Minas Gerais</option>
                                                <option ('uf', 'PA' ) value="PA">Pará</option>
                                                <option ('uf', 'PB' ) value="PB">Paraíba</option>
                                                <option ('uf', 'PR' ) value="PR">Paraná</option>
                                                <option ('uf', 'PE' ) value="PE">Pernambuco</option>
                                                <option ('uf', 'PI' ) value="PI">Piauí</option>
                                                <option ('uf', 'RJ' ) value="RJ">Rio de Janeiro</option>
                                                <option ('uf', 'RN' ) value="RN">Rio Grande do Norte</option>
                                                <option ('uf', 'RS' ) value="RS">Rio Grande do Sul</option>
                                                <option ('uf', 'RO' ) value="RO">Rondônia</option>
                                                <option ('uf', 'RR' ) value="RR">Roraima</option>
                                                <option ('uf', 'SC' ) value="SC">Santa Catarina</option>
                                                <option ('uf', 'SP' ) value="SP">São Paulo</option>
                                                <option ('uf', 'SE' ) value="SE">Sergipe</option>
                                                <option ('uf', 'TO' ) value="TO">Tocantins</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <!-- Botões -->
                                    <div class="container-btn">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                        <button type="button" class="btn btn-secondary ">Cancelar</button>
                                    </div>
                                    </section>
                                </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="../public/assets/js/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>
    <script src="../public/assets/js/mascara.js"></script>
</body>





@endsection
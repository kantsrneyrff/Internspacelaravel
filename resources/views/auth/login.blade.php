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
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <title>Login - InternSpace</title><!----Titulo das Páginas---->
</head>

<link rel="stylesheet" href="/css/login.css">

<body>
    <main>
        <div class="container center-total">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Login</h3>
                        </div>
                        <div class="card-body">
                            @error('error')
                            <div class="alert alert-warning alert-dismissible fade show" id="alertteste" role="alert">
                                <strong>Erro!</strong> {{$message}} <button type="button" onclick="$('#alertteste').alert('close');" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                            </div>
                            @enderror
                            <form action="{{route('login-authentication')}}" method="post">
                                @csrf
                                <!-- Email -->
                                <div class="input-group form-floating mb-3">
                                    <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="text" name="email" id="input-email" value="{{old('email')}}" />
                                    <label for="inputEmail">Email</label>
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- Senha -->
                                <div class="input-group form-floating mb-3">
                                    <input class="form-control  @error('password') is-invalid @enderror" id="inputPassword" name="password" type="password" id="input-email" value="{{old('password')}}" />
                                    <label for="inputPassword">Senha</label>
                                    <button class="btn btn-outline-secondary" onclick="passwordToggle()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                    @error('password')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button class="btn btn-primary" type="submit" onclick="localStorage.setItem('tempo','3600')">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="esqSenha">Esqueceu sua senha?</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="/js/senha.js"></script>
</body>

</html>
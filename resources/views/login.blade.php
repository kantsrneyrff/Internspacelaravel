@extends('layouts.header')<!--- Tamplate da página --->

@section('title','Login')

@section('content')

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
                            @if (count($errors) > 0) 
                                <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                                    <strong>Errors:</strong>
                                  @foreach ($errors as $error) 
                                        <br><?= $error ?>
                                    @endforeach
                                    <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </span>
                                </div>
                           @endif

                            <form action="" method="post">
                                <!-- Email -->
                                <div class="input-group form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="email" name="email" id="input-email"  placeholder="name@example.com" required />
                                    <label for="inputEmail">Email</label>
                                </div>


                                <!-- Senha -->
                                <div class="input-group form-floating mb-3">
                                    <input class="form-control" id="inputPassword" name="senha" type="password" id="input-email"  placeholder="senha" required />
                                    <label for="inputPassword">Senha</label>
                                    <button class="btn btn-outline-secondary" onclick="passwordToggle()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                </div>

                                <div class="form-check mb-3">

                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                    <button class="btn btn-primary" type="submit" onclick="localStorage.setItem('tempo','3600')">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="register.html">esqueceu a senha ?</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../public/assets/js/senha.js"></script>
@endsection
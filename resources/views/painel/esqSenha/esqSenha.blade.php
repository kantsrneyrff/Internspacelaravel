@extends('layouts.template')

@section('title', 'Alterar senha')

@section('content')
<body>
    <main>
        <div class="container center-total">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Esqueceu Sua Senha?</h3>
                        </div>
                        <div class="card-body">

                            <form action="" method="post">
                                <!-- Senha atual -->
                                <div class="input-group form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="email" name="email" id="input-email" placeholder="name@example.com" required />
                                    <label for="inputEmail">Digite seu Email</label>
                                </div>

                                <div class="form-check mb-3">

                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                    <button class="btn btn-primary" href="../codVerif/codVerif.html" type="submit" onclick="localStorage.setItem('tempo','3600')">Confirmar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
@endsection
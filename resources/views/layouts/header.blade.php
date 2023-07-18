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
        <title>@yield('title')</title><!----Titulo das Páginas---->

        <script src="/js/temporizadorLogout.js"></script>
        <script src="/js/painel.js"></script>
</head>


        @yield('content')
        <!---- conteudo da pagina, ao final da section content(conteúdo) necessário adicionar o @endsection ----->

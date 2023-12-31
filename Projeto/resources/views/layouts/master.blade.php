<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Atividade')</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/editar_perfil.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/reservas.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/atividade.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/paymentForm.css') }}"/>
</head>
<body id="body">
    <header>@include('includes.navbar')</header>
    
    <div class="content">
        @yield('content')
    </div>

    @include('includes.footer')
    @include('includes.scripts')
</body>
</html>

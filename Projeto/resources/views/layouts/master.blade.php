<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Atividade')</title>
    <link rel="stylesheet" href="css/navbar.css"/>
    <link rel="stylesheet" href="css/home.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
</head>
<body>
    <header>@include('includes.navbar')</header>
    

    <div class="content">
        @yield('content')
    </div>

    @include('includes.footer')
    @include('includes.scripts')
</body>
</html>
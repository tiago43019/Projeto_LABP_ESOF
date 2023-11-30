<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Em Rotas</title>
    <link rel="stylesheet" href="css/navbar.css"/>
    <link rel="stylesheet" href="css/home.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
</head>
<body>
    <header>@include('includes.navbar')</header>
    <div><p style='margin-top: 3%;margin-bottom: 2%;'>Explorando destinos, criando memórias. Sua jornada começa aqui. Agência de viagens dedicada a tornar seus sonhos de viagem realidade. </p></div>
    <div class="gallery">
        <div class="item">
            <a href="/produto1"><img src="/fotos/logo_png.png" alt="Imagem 1"></a>
            <div class="info">
                <h4>Produto 1</h4>
                <p>Descrição curta do produto.</p>
                <p class="price">99,99€</p>
            </div>
        </div>

        <div class="item">
            <a href="/login"><img src="/fotos/logo_png.png" alt="Imagem 2"></a>
            <div class="info">
                <h4>Produto 2</h4>
                <p>Outra descrição curta.</p>
                <p class="price">79,99€</p>
            </div>
        </div>

        <div class="item">
            <a href="/login"><img src="/fotos/logo_png.png" alt="Imagem 3"></a>
            <div class="info">
                <h4>Produto 3</h4>
                <p>Descrição curta do terceiro produto.</p>
                <p class="price">129,99€</p>
            </div>
        </div>

        <div class="item">
            <a href="/login"><img src="/fotos/logo_png.png" alt="Imagem 4"></a>
            <div class="info">
                <h4>Produto 4</h4>
                <p>Outra descrição curta para o quarto produto.</p>
                <p class="price">49,99€</p>
            </div>
        </div>

        <div class="item">
            <a href="/login"><img src="/fotos/logo_png.png" alt="Imagem 5"></a>
            <div class="info">
                <h4>Produto 1</h4>
                <p>Descrição curta do produto.</p>
                <p class="price">99,99€</p>
            </div>
        </div>

        <div class="item">
            <a href="/login"><img src="/fotos/logo_png.png" alt="Imagem 6"></a>
            <div class="info">
                <h4>Produto 2</h4>
                <p>Outra descrição curta.</p>
                <p class="price">79,99€</p>
            </div>
        </div>

        <div class="item">
            <a href="/login"><img src="/fotos/logo_png.png" alt="Imagem 7"></a>
            <div class="info">
                <h4>Produto 3</h4>
                <p>Descrição curta do terceiro produto.</p>
                <p class="price">129,99€</p>
            </div>
        </div>

        <div class="item">
            <a href="/login"><img src="/fotos/logo_png.png" alt="Imagem 8"></a>
            <div class="info">
                <h4>Produto 4</h4>
                <p>Outra descrição curta para o quarto produto.</p>
                <p class="price">49,99€</p>
            </div>
        </div>

    </div>



    @include('includes.footer')
    @include('includes.scripts')
</body>
</html>
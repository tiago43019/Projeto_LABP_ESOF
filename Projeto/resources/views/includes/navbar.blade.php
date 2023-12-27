<nav class='nav'>
    <div class="logo" style="display: flex; align-items: center; margin-top:1.2vh;">
        <a href="{{ Auth::check() && Auth::user()->is_admin ? '/adminhome' : '/home' }}">
            <img src="/fotos/logo_png.png" alt="logo">
        </a>
    </div>
    <div class="hamburger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <ul class="nav-links">
        <li><a href="/explorar">Explorar</a></li>
        <li><a href="https://www.web-leb.com/code">por fazer</a></li>
        <li>
            <input type="search" id="searchInput" placeholder="Pesquisar...">
            <div id="searchResults" class="search-results">
                <div class="search-curtain" id="searchCurtain"></div>
            </div>
        </li>
        @auth
            <!-- Se o usuário estiver autenticado (logado) -->
            <div class="user-menu">
                <span id="user-name">{{ Auth::user()->getFirstName() }} {{ Auth::user()->getLastName() }}<i class="fas fa-caret-down"></i></span>
                <ul class="mini-menu">
                    @if(Auth::user()->is_admin)
                        <li><a class="gerir-reservas" href="/criaratividade">Criar Atividade</a></li>
                    @endif
                    <li><a class="ver-perfil" href="/perfil">Ver Perfil</a></li>
                    <li><a class="gerir-reservas" href="/reservas">Gerir Reservas</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btnlogout">Terminar Sessão</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <!-- Se o usuário não estiver autenticado (não logado) -->
            <a href="/login" class="btn">Entrar</a>
        @endauth
    </li>
</ul>
</nav>
<script src="/js/navbar.js"></script>

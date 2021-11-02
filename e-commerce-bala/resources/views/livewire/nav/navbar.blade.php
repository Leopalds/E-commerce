<nav class="cabecalho navbar navbar-expand-xl navbar-dark bg-dark">
    <div class="container-fluid px-5">
        <h1><a class="navbar-brand fs-2 fw-light cabecalho__brand" href="/"><span class="fw-bold cabecalho__brand--h">H</span>ulmer's</a></h1>
        <button class="navbar-toggler vermelho" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center cabecalho__itens">
                @livewire('nav.link-navegacao', ['nomePagina' => 'Home', 'rota' => route('home')])
                @livewire('nav.link-navegacao', ['nomePagina' => 'Produtos', 'rota' => route('produtos.index')])
                @livewire('nav.link-navegacao', ['nomePagina' => 'Contato', 'rota' => route('contato')])
                @livewire('nav.link-navegacao', ['nomePagina' => 'Quem somos', 'rota' => route('quemsomos')])
            </ul>
            <hr class="text-light">
            @livewire('nav.barra-pesquisa')
            <div class="d-flex align-items-center cabecalho_lado-direito">
                @guest
                <div class="me-4">
                    <i class="fas fa-user text-light me-1"></i>
                    <a href="{{ route('login') }}" class="text-light fw-bold text-decoration-none">Login</a>
                </div>              
                @endguest
                @auth
                <div class="dropdown me-3">
                    <button class="btn btn-primary border-0 bg-transparent dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <small class="text-light me-2">Bem vindo!</small>
                        <i class="fas fa-user"></i>                
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a href="#" class="dropdown-item text-decoration-none disabled">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        @if (Auth::user()->isAdmin())
                        <li>
                            <a class="dropdown-item text-decoration-none" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        @endif
                        <li><a class="dropdown-item" href="#">Minhas compras</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="dropdown-item fw-bold text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth
                <a href="{{ route('carrinho.index') }}" class="fs-4 cabecalho__cart text-decoration-none">
                    <i class="fas fa-shopping-cart"></i>
                    <small>({{ Cart::content()->count() }})</small>
                </a>
            </div>
        </div>
    </div>
</nav>

<nav class="cabecalho navbar navbar-expand-xl navbar-dark bg-dark">
    <div class="container-fluid px-5">
        <h1><a class="navbar-brand fs-2 fw-light cabecalho__brand" href="/"><span class="fw-bold cabecalho__brand--h">H</span>ulmer's</a></h1>
        <button class="navbar-toggler vermelho" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center cabecalho__itens">
                <x-nav.link-navegacao nome-pagina="Home" rota="{{ route('home') }}"/>
                <x-nav.link-navegacao nome-pagina="Produtos" rota="{{ route('produtos.index') }}"/>
                <x-nav.link-navegacao nome-pagina="Contato" rota="{{ route('contato') }}"/>
                <x-nav.link-navegacao nome-pagina="Quem somos" rota="{{ route('quemsomos') }}"/>
            </ul>
            <hr class="text-light">
            <form class="d-flex mb-3 busca w-100 cabecalho__busca">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn busca__botao" type="submit">Buscar</button>
            </form>
            <div class="d-flex align-items-center cabecalho_lado-direito">
                @guest
                <div class="me-4">
                    <i class="fas fa-user text-light me-2"></i>
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
                <a href="{{ route('carrinho.index') }}" class="fs-4 carrinho text-decoration-none">
                    <i class="fas fa-shopping-cart"></i>
                    <small>({{ Cart::content()->count() }})</small>
                </a>
            </div>
        </div>
    </div>
  </nav>
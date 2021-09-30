<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Css Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{--JS Bootstrap--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    {{--JQuery--}}
    <script src="{{ asset('js/jquery-3-6-0-min.js') }}"></script>

     {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/1194f437a6.js" crossorigin="anonymous"></script>

     {{-- Nosso CSS --}}
    @yield('css')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/busca/busca__botao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/busca/busca.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cabecalho/cabecalho__brand.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cabecalho/cabecalho__brand--h.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rodape/rodape__redes-link.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrinho/carrinho.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cabecalho/cabecalho__lado-direito.css') }}">

</head>
<body>
  <nav class="cabecalho navbar navbar-expand-xl navbar-dark bg-dark pb-3">
    <div class="container">
      <h1><a class="navbar-brand fs-2 fw-light cabecalho__brand" href="/"><span class="fw-bold cabecalho__brand--h">H</span>ulmer's</a></h1>
      <button class="navbar-toggler vermelho" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/produtos">Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contato">Contato</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/quemsomos">Quem somos</a>
            </li>
          </ul>
          <hr class="text-light">
          <div class="cabecalho__lado-direito">
            <form class="d-flex mb-3 busca">
              <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
              <button class="btn busca__botao" type="submit">Buscar</button>
            </form>
            <div class="d-flex align-items-center">
              @guest

                <a href="#" class="text-light text-decoration-none me-4">Login</a>
      
              @endguest
              @auth

                <a href="#" class="text-light text-decoration-none me-4">
                  <i class="fas fa-shopping-cart"></i>
                  <small>Nome do usuario</small>
                </a>
            
              @endauth
                <a href="/carrinho" class="fs-4 carrinho"><i class="fas fa-shopping-cart"></i></a>
            </div>
          </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
      @yield('conteudo')
  </div>

  <footer class="bg-dark p-3">
    <ul class="d-flex justify-content-center">
      <li>
        <a href="#">
          <i class="fab fa-instagram-square me-5 fs-2 rodape__redes-link"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fab fa-facebook-square me-5 fs-2 rodape__redes-link"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fab fa-twitter-square me-5 fs-2 rodape__redes-link"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fab fa-whatsapp-square me-4 fs-2 rodape__redes-link"></i>
        </a>
      </li>
    </ul>
  </footer> 
 
  @yield('js')

  <script src="{{ asset('js/menu/link-ativo.js') }}"></script>
  <script type="text/javascript">
    $(function () {
      linkAtivo();
    })  
  </script> 
  <script type="text/javascript" src="{{ asset('js/slick/slick.min.js') }}"></script>
</body>
   

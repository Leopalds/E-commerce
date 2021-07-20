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
    <script src="js/jquery-3-6-0-min.js"></script>

     {{-- Font Awesome --}}
     <script src="https://kit.fontawesome.com/1194f437a6.js" crossorigin="anonymous"></script>
     @yield('css')

      <link rel="stylesheet" href="css/cabecalho/cabecalho_botao.css">
      <link rel="stylesheet" href="css/cabecalho/cabecalho_brand.css">
      <link rel="stylesheet" href="css/cabecalho/cabecalho_brand--h.css">
      <link rel="stylesheet" href="css/rodape/rodape_redes.css">

    {{--Nosso Script--}}
    <script src="js/menu/link-ativo.js"></script>

</head>
<body class="">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fs-2 fw-light cabecalho_brand" href="/"><span class="fw-bold cabecalho_brand--h">H</span>ulmer's</a>
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
            <li class="nav-item">
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn cabecalho_botao" type="submit">Buscar</button>
              </form>
            </li>
          </ul>
          <hr class="text-light">
          @guest

            <a href="#" class="text-light text-decoration-none">Login</a>
            
          @endguest
          @auth

            <a href="#" class="text-light text-decoration-none">
              <i class="fas fa-shopping-cart"></i>
              <small>Nome do usuario</small>
            </a>
            
          @endauth
      </div>
    </div>
  </nav>

  <div class="container">
      @yield('conteudo')
  </div>

  <footer class="bg-dark p-3">
    <ul class="d-flex justify-content-center">
      <li>
        <a href="#">
          <i class="fab fa-instagram-square me-5 fs-2 rodape_redes"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fab fa-facebook-square me-5 fs-2 rodape_redes"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fab fa-twitter-square me-5 fs-2 rodape_redes"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fab fa-whatsapp-square me-4 fs-2 rodape_redes"></i>
        </a>
      </li>
    </ul>
  </footer>
  <script>
      $(function () {
        linkAtivo()
      })
  </script>
   

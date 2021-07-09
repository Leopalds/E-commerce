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

    {{--Font Awesome--}}
    <script src="https://kit.fontawesome.com/b763dd609a.js" crossorigin="anonymous"></script>

    {{--Nosso CSS--}}
    <link rel="stylesheet" href="css/cabecalho/botao-search.css">
    <link rel="stylesheet" href="css/cabecalho/brand.css">
    <link rel="stylesheet" href="css/rodape/redes-sociais.css">

    {{--Nosso Script--}}
    <script src="js/menu/link-ativo.js"></script>

</head>
<body class="">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fs-2 fw-light" href="/"><span class="fw-bold nav-brand_h">H</span>ulmer's</a>
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
              <a class="nav-link" href="/quem-somos">Quem somos</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn botao-search" type="submit">Buscar</button>
          </form>
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
          <i class="fab fa-instagram-square me-5 fs-2 rede-social_item instagram"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fab fa-facebook-square me-5 fs-2 rede-social_item facebook"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fab fa-twitter-square me-5 fs-2 rede-social_item twitter"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fab fa-whatsapp-square fs-2 rede-social_item whatsapp"></i>
        </a>
      </li>
    </ul>
  </footer>
  <script>
      $(function () {
          linkAtivo();
      })
  </script>
</body>
</html>
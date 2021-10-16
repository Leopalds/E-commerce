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

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
  <x-nav.navbar/>

  <div class="container-fluid d-flex flex-column align-items-center">
      @yield('conteudo')
  </div>

  <footer class="bg-dark p-3 footer">
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
     
  </script> 
  <script type="text/javascript" src="{{ asset('js/slick/slick.min.js') }}"></script>
</body>
   

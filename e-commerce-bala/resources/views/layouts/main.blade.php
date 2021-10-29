<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Fonte --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;400;700&display=swap" rel="stylesheet">

    {{-- Css Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{--JS Bootstrap--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    {{--JQuery--}}
    <script src="{{ asset('js/jquery-3-6-0-min.js') }}"></script>

     {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/1194f437a6.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @livewireStyles
     {{-- Nosso CSS --}}
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     @yield('css')
</head>
<body>
  @livewire('nav.navbar')

  <div class="container-fluid d-flex flex-column align-items-center">
      @yield('conteudo')
  </div>

  @livewire('footer.footer')
 
  @yield('js')
  @livewireScripts
</body>
   

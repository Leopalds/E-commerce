@extends('layout.main')
@section('css')

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/home/home-banner.css">
    <link rel="stylesheet" href="css/home/home-banner__img.css">
    
@endsection

@section('conteudo')
    <div class="home-banner">
        <img src="{{asset('../img/bebidas.jpg')}}" class="home-banner__img img-fluid" alt="Banner da Hulmer's">
        <figcaption>A sua cerveja entregue por quem <span>ama</span></figcaption>
    </div>
    <div class="container d-flex flex-wrap justify-content-center mb-3">
        <h2 class="text-center mt-3">Produtos que Hulmer's recomenda para você</h2>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    </div>
    <div class="home-banner">
        <img src="{{asset('img/prateleiras.jpg')}}" class="home-banner__img img-fluid" alt="Banner da Hulmer's com prateleiras">
        <figcaption><span id="variedade-qual">Variedade</span> e <span id="variedade-qual">qualidade</span> você encontra aqui</figcaption>
    </div>
@endsection
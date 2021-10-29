@extends('layouts.main')
@section('conteudo')
    <!--<div class="img-fluid quem-somos_banner--um"></div>-->
    <div class="banner">
        <img class="img-fluid banner__img" src="{{ asset('img/cervejaria.jpg') }}" alt="Cervejaria">
    </div>
    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-3">Quem somos?</h1>
            <p>Olá! somos a Hulmer's, uma empresa do ramo da boa cerveja. A hulmer's vem desde 2010 trazendo as cervejas da melhor qualidade para você não se preocupar com nada, apenas em bebê-la.</p>
            <p>A Hulmer's leva no conforto de sua casa, festa ou até Iate a suas bebidas bem geladas e de qualidade.</p>
    </div>
    <!--<div class="img-fluid quem-somos_banner--dois"></div>-->
    <div class="banner">
        <img class="img-fluid banner__img" src="{{ asset('img/beer-friends.jpg') }}" alt="Amigos tomando cerveja.">
    </div>
    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-3">Onde nos Localizamos?</h1>
        <p>Nosso espaço aconchegante irá trazer uma ótima experiência para você e seus amigos. Venha nos conhecer!</p>
        <p>Dê uma passadinha em nosso estabelecimento ou reserve um horário.</p>
    </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d230.4386143936069!2d-44.45523285257837!3d-22.46596425337237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9e7e95e3a41dc5%3A0x5de60073966f5d2d!2sSalesiano!5e0!3m2!1sen!2sbr!4v1625790059225!5m2!1sen!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="mb-5"></iframe>
    <div class="container mt-3">
<<<<<<< HEAD:e-commerce-bala/resources/views/paginas/publico/quemsomos.blade.php
        <p class="text-center">Entre em contato conosco na página de <a href="{{route('contato')}}">contato</a> ou pelo nosso whatsapp (24) 999844243 <i class="fab fa-whatsapp"></i></p>
=======

        <p class="text-center">Entre em contato conosco na página de <a href="{{ route('contato') }}">contato</a> ou pelo nosso whatsapp (24) 999844243 <i class="fab fa-whatsapp"></i></p>
>>>>>>> main:e-commerce-bala/resources/views/quemsomos.blade.php
    </div>
@endsection

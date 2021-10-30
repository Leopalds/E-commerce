@if (count($imagens) != 0)
    @foreach ($imagens as $index => $imagem)
    <div class="carousel-item {{ $index == 0 ? 'active' : '' }} carrossel__item">
        <img class="d-block w-100 carrossel__img" src="{{ asset('storage/img/produto/' . $imagem->nome) }}" alt="primeira imagem">
    </div>
    @endforeach
    @else
    <div class="carousel-item active carrossel__item">
        <img class="d-block w-100 carrossel__img" src="https://t3.ftcdn.net/jpg/03/49/45/70/360_F_349457036_XWvovNpNk79ftVg4cIpBhJurdihVoJ2B.jpg" alt="primeira imagem">
    </div>
@endif

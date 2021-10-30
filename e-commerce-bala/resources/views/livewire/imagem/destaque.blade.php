@if (count($produto->imagens) != 0)
    <img style="widows: 200px; height: 200px; object-fit: cover" src="{{ asset('storage/img/produto/' . $produto->unicaImagem->first()->nome) }}" class="card-img-top" alt="descricao">
    @else
    <img style="widows: 200px; height: 200px; object-fit: cover" src="https://t3.ftcdn.net/jpg/03/49/45/70/360_F_349457036_XWvovNpNk79ftVg4cIpBhJurdihVoJ2B.jpg" class="card-img-top" alt="descricao">
@endif

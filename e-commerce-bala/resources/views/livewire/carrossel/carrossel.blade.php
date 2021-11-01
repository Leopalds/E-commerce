<div class="col-6 me-5 produto__img">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($produto->imagens as $index => $imagem)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner carrossel__lista my-2">
            @livewire('carrossel.imagem', ['imagens' => $produto->imagens])
        </div>
        @livewire('carrossel.controlador', [
          'tipo' => 'prev',
          'texto' => 'Anterior'
        ])
         @livewire('carrossel.controlador', [
          'tipo' => 'next',
          'texto' => 'Próximo'
        ])
    </div>
</div>

@extends('layouts.main')
@section('conteudo')
<div class="container ">
    @livewire('ajax.loading')

    <form id="contato" action="{{ route('mail.enviar') }}" method="POST" name="form_contato" class="mt-5 mb-5 d-flex flex-column">
        @csrf
        <div class="row mb-3">
            @livewire('form.input', [
            'label' => 'Nome',
            'type' => 'text',
            'name' => 'name',
            'placeholder' => 'Nome completo',
            'extraCss' => 'col-md-6'
            ])
            @livewire('form.input', [
                'label' => 'Telefone',
                'type' => 'text',
                'name' => 'telefone',
                'placeholder' => 'DDD 99999-9999',
                'extraCss' => 'col-md-6'
            ])
        </div>
        @livewire('form.input', [
            'label' => 'E-mail',
            'type' => 'email',
            'name' => 'email',
            'placeholder' => 'email@seudominio.com'
        ])
        @livewire('form.input', [
            'label' => 'Assunto',
            'type' => 'text',
            'name' => 'assunto',
            'placeholder' => 'Assunto'
        ])
        @livewire('form.textarea', [
            'label' => 'Mensagem',
            'name' => 'mensagem',
            'placeholder' => 'Escreva aqui sua mesagem...'
        ])
        <div class="align-self-center">
            @livewire('botao.com-fundo', [
                'conteudo' => 'Enviar',
                'extraCss' => 'align-self-center'
            ])
        </div>
    
    </form>
    
    <h2 class="text-center mb-5">Onde Estamos</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d230.4386143936069!2d-44.45523285257837!3d-22.46596425337237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9e7e95e3a41dc5%3A0x5de60073966f5d2d!2sSalesiano!5e0!3m2!1sen!2sbr!4v1625790059225!5m2!1sen!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="mb-5"></iframe>
</div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/ajax/enviarDados.js') }}"></script>
<script>
    $('#contato').on("submit", function (event) { 
        event.preventDefault();

        var dados = new FormData(this);
        var rota = '{{ route("mail.enviar") }}';
        var msg = 'E-mail enviado com successo!';

        enviarDados(rota, dados, msg);
    });
    
</script>
@endsection
@extends('layout.main')

@section('conteudo')
<div class="container">
    <form action="{{ route('mail.enviar') }}" method="POST" name="form_contato" id="form_contato" class="mt-5 mb-5 d-flex flex-column">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="nome" class="form-label mt-2">Nome</label>
                <input type="text" class="form-control" name="name" placeholder="Nome Completo" >
            </div>
            <div class="form group col-md-6">
            <label for="telefone" class="form-label mt-2">Telefone</label>
            <input type="text" class="form-control" name="telefone" placeholder="Telefone" >
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="form-label mt-2">Endereço de email</label>
            <input type="text" class="form-control"  name="email" placeholder="Email" >
        </div>
        <div class="form-group">
            <label for="assunto" class="form-label mt-2">Assunto</label>
            <input type="text" class="form-control" id="inputAddress" name="assunto" placeholder="Assunto" >
        </div>
        <div class="form-group">
            <label for="mensagem" class="form-label mt-2">Mensagem</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" style="resize: none" name="mensagem" rows="3" placeholder="Escreva aqui sua linda mensagem"></textarea>
        </div>
        <div class="align-self-center">
            <input type="submit" class="btn btn-danger mt-3" ></input>
        </div>
    
    </form>
    
    <h2 class="text-center mb-5">Onde Estamos</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d230.4386143936069!2d-44.45523285257837!3d-22.46596425337237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9e7e95e3a41dc5%3A0x5de60073966f5d2d!2sSalesiano!5e0!3m2!1sen!2sbr!4v1625790059225!5m2!1sen!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="mb-5"></iframe>
</div>
@endsection
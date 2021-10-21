<div>
    <h2>Dados do remetente:</h2>
    <ul>
        <li>
            Nome: {{ $nomeCompleto }}
        </li>
        <li>
            Telefone: {{ $telefone }}
        </li>
    </ul>
    <h2>Mensagem: </h2>
    <div>
        <h3>{{ $assunto }}</h3>
        <p>{{ $mensagem }}</p>
    </div>
</div>
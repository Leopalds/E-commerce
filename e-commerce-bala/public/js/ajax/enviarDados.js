function enviarDados(rota, dados, metodo, msg) 
{
    $.ajax({
        type: metodo,
        url: rota,
        data: dados,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success === true) {
                Swal.fire({
                    title: msg,
                    icon: 'success',
                    confirmButtonText: 'Fechar',
                })
                return;
            }    
            displayErrors(response);
        },
    });
}

function displayErrors(response)
{
    $('small.' + 'erro__imagem').text(response.erro_img);
    setTimeout(() => {
        $('small.' + 'erro__imagem').text('');
    }, 5000);

    $.each(response.erros, function(chave, valor) {
        $('small.' + 'erro__' + chave).text(valor);

        setTimeout(() => {
            $('small.' + 'erro__' + chave).text('');
        }, 5000);
    })
}

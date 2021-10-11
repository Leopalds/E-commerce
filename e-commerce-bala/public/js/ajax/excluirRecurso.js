function excluirRecurso(rota, dados, msg, linha)
{
    
    $.ajax({
        type: "POST",
        url: rota,
        data: dados,
        dataType: "json",
        success: function (response) {
            if (response.success === true) {
                Swal.fire({
                    title: msg,
                    icon: 'success',
                    confirmButtonText: 'Fechar',
                });
                
                linha.remove();
            }
        }
    });
}
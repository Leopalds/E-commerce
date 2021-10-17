function excluirRecurso(rota, dados, titulo, msg, linha)
{
    Swal.fire({
        title: titulo,
        showDenyButton: true,
        confirmButtonText: 'Sim',
        denyButtonText: `Nao`,
        showLoaderOnConfirm: true,
        preConfirm: function () {
            ajaxDelete(rota, dados, msg, linha); 
            
        }
    });

}

function ajaxDelete(rota, dados, msg, linha)
{
    $.ajax({
        type: "POST",
        url: rota,
        data: dados,
        dataType: "json",
        processData: false,
        success: function (response) {
            if (response.success === true) {
                Swal.fire({
                    title: msg,
                    icon: 'success',
                    confirmButtonText: 'Fechar',
                });

                linha.remove();
                return true;
            }
        }
    });
}
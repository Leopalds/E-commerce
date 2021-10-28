function excluirRecurso(rota, dados, titulo, msg, linha, valorTotal = "")
{
    Swal.fire({
        title: titulo,
        showDenyButton: true,
        confirmButtonText: 'Sim',
        denyButtonText: `Nao`,
        showLoaderOnConfirm: true,
        preConfirm: function () {
            ajaxDelete(rota, dados, msg, linha, valorTotal);  
        }
    });

}

function ajaxDelete(rota, dados, msg, linha, valorTotal = "")
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

                if (valorTotal !== "") {
                    console.log("entrei")
                    $('[data-valor-total]').text(valorTotal.toFixed(2));
                }

                linha.remove();
                return true;
            }
        }
    });
}
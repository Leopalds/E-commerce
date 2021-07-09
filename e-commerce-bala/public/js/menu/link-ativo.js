function linkAtivo() {
    const urlAtual = window.location.pathname; 
    const linkAtual = $(`a[href='${urlAtual}']`);

    linkAtual.addClass('active');
}
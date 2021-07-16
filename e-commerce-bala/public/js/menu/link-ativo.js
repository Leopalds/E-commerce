function linkAtivo() {
    const urlAtual = window.location.pathname; 
    console.log(urlAtual)
    const linkAtual = $(`a[href='${urlAtual}']`);

    linkAtual.addClass('active').attr("aria-current", "page");
}
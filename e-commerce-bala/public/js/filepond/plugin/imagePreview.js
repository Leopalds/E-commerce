function imagePreview(elemento)
{
    FilePond.registerPlugin(FilePondPluginImagePreview);
    $(elemento).filepond({
        allowMultiple: true,
        storeAsFile: true,
        imagePreviewMaxHeight: 100,
        labelIdle: 'Insira suas imagens aqui...'
    });
}
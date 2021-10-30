FilePond.registerPlugin(FilePondPluginImagePreview);

function filePondInit(elemento)
{
    $(elemento).filepond({
        allowMultiple: true,
        storeAsFile: true,
        imagePreviewMaxHeight: 100,
        labelIdle: 'Insira suas imagens aqui...',
    });
}
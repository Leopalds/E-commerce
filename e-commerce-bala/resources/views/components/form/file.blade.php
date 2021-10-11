<div class="d-flex flex-column">
    <small class="erro erro__{{ $atributo }} text-danger"></small>
    <label for="{{ $atributo }}-{{ $entidade }}">{{ $label }}</label>
    <input id="{{ $atributo }}-{{ $entidade }}" data-max-files="3" multiple name="{{ $atributo }}[]" class="filepond--item">
</div>
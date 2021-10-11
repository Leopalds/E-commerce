<div class="mb-3 d-flex flex-column">
    <small class="erro erro__{{ $atributo }} text-danger"></small>
    <label for="{{ $atributo }}-produto" class="form-label">{{ $label }}</label>
    <textarea 
        type="text" 
        name="{{ $atributo }}" 
        class="form-control" 
        id="{{ $atributo }}-produto"
        style="resize: none">{{ $valor }}</textarea>
</div>
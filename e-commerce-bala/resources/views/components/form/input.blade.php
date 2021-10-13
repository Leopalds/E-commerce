<div class="mb-3 d-flex flex-column">
    <small class="erro erro__{{ $atributo }} text-danger"></small>
    <label for="{{ $atributo }}-{{ $entidade }}" class="form-label">{{ $label }}</label>
    <input 
        type="{{ $tipo }}" 
        name="{{ $atributo }}" 
        class="form-control" id="{{ $atributo }}-{{ $entidade }}" 
        value="{{ $valor }}"
        {{ empty($readonly) ? '' : $readonly }}
        min="0">    
</div>
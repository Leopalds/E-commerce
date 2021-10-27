<div class="form-group mb-3 d-flex flex-column {{ $extraCss }}">
    <label for="mensagem" class="form-label mt-2">{{ $label }}</label>
    <textarea 
        class="form-control" 
        style="resize: none" 
        name="{{ $name }}" 
        rows="3" 
        placeholder="{{ $placeholder }}">{{ $valor }}</textarea>
    <small class="erro erro__{{ $name }} text-danger "></small>
</div>

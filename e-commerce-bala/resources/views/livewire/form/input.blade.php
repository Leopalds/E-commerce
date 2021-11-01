<div class="form-group mb-3 d-flex flex-column {{ $extraCss }}">
    <label class="form-label mt-2">{{ $label }}</label>
    <input 
        type="{{ $type }}" 
        step="0.01"
        class="form-control" 
        name="{{ $name }}" 
        placeholder="{{ $placeholder }}" 
        value="{{ $valor }}">
    <small class="erro erro__{{ $name }} text-danger "></small>
</div>

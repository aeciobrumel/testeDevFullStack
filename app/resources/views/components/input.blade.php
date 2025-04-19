<!-- resources/views/components/input.blade.php -->
<div>
    <input 
        id="{{ $name }}" 
        type="{{ $type }}" 
        name="{{ $name }}" 
        value="{{ old($name) }}" 
        placeholder="{{ $placeholder }}" 
        @if($required) required @endif
        class="form-control"
    >
    
    <!-- Exibição de erros de validação -->
    @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

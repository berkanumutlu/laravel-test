<div class="form-floating mb-3">
    <textarea name="{{ $name }}" @if(isset($id)) id="{{ $id }}" @endif @if(isset($class)) class="{{ $class }}" @endif @if(isset($placeholder)) placeholder="{{ $placeholder }}" @endif cols="{{ $cols ?? 3 }}" rows="{{ $rows ?? 10 }}" {{ $attributes ?? '' }}>{{ $value ?? '' }}</textarea>
    @if(isset($id) && isset($label))
        <label for="{{ $id }}">{{ $label }}</label>
    @endif
</div>

<div class="form-floating mb-3">
    <div class="form-check form-switch">
        <input {{ $attributes->class('form-check-input') }} type="checkbox" role="switch" @if(isset($id)) id="{{ $id }}" @endif>
        @if(isset($id) && isset($label))
            <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
        @endif
    </div>
</div>

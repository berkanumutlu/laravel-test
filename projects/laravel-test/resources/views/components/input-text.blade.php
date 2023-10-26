{{--php artisan make:component InputText--}}
@if(isset($id) && isset($label))
    <label for="{{ $id }}">{{ $label }}</label>
@endif
<input type="{{ $type }}" name="{{ $name }}" @if(isset($id)) id="{{ $id }}" @endif @if(isset($class)) class="{{ $class }}" @endif @if(isset($placeholder)) placeholder="{{ $placeholder }}" @endif {{ $attributes ?? '' }}>

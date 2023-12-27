{{--php artisan make:component InputText--}}
@if(isset($id) && isset($label))
    <label for="{{ $id }}">{{ $label }}</label>
@endif
<input type="{{ $type }}" name="{{ $name }}"
    {{ isset($id) ? 'id=' . $id : '' }}
    {{--{{ isset($class) ? 'class=' . $class : '' }}--}}
    {{ $attributes->class(['p-4', $class]) }}
    {{ isset($placeholder) ? 'placeholder=' . $placeholder : '' }}
    {{ $attributes ?? '' }}
>

{{--php artisan make:component InputText2 --view--}}
@php
    $types = ['radio', 'text'];
	if (in_array($type, $types))
	{

	}
@endphp
@if(isset($id) && isset($label))
    <label for="{{ $id }}">{{ $label }}</label>
@endif
<input type="{{ $type }}" name="{{ $name }}" @if(isset($id)) id="{{ $id }}" @endif @if(isset($placeholder)) placeholder="{{ $placeholder }}" @endif
    {{--{{ $attributes->merge(['class' => $attributes['class'] . $color]) }}--}}
    {{ $attributes->class(['bg-danger', 'text-white' => $error]) }}
>

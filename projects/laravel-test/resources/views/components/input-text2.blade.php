{{--php artisan make:component InputText2 --view--}}
{{--{{ $attributes->get('class') }}--}}
@php
    $types = ['radio', 'text'];
	if (in_array($type, $types))
	{

	}
@endphp
@if(isset($id) && isset($label))
    <label for="{{ $id }}">{{ $label }}</label>
@endif
<input type="{{ $type }}" name="{{ $name }}"
    {{ isset($id) ? 'id=' . $id : '' }}
    {{ isset($placeholder) ? 'placeholder=' . $placeholder : '' }}
    {{--{{ $attributes->merge(['class' => $attributes['class'] . $color]) }}--}}
    {{ $attributes->class(['bg-danger', 'text-white' => $error]) }}
>

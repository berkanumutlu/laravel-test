@php
    if (empty($id))
	{
		$id = uniqid('input-');
    }
@endphp
<div class="form-floating mb-3">
    <input type="{{ $type ?? 'text' }}"
           name="{{ $name }}"
           @if(isset($id)) id="{{ $id }}" @endif
           @if(isset($class)) class="{{ $class }}" @endif
           @if(isset($placeholder)) placeholder="{{ $placeholder }}" @endif
           {{ $attributes ?? '' }}
           {{ isset($isDisabled) && $isDisabled ? 'disabled' : '' }}
           @if(isset($defaultValue)) value="{{ $defaultValue }}" @endif
    >
    @isset($id, $label)
        <label for="{{ $id }}" @if(isset($labelClass)) class="{{ $labelClass }}" @endif>{{ $label }}</label>
    @endisset
</div>

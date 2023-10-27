{{--@dump($attributes)--}}
{{--@dump($attributes->get('class'))--}}
{{--@dump($options->attributes->get('options'))--}}
<div class="form-floating mb-3">
    <select {{ $attributes->class(['form-control']) }} name="{{ $name }}" @if(isset($id)) id="{{ $id }}" @endif>
        @if(!empty($options->attributes->get('options')))
            @foreach($options->attributes->get('options') as $key => $value)
                <option value="{{ $key }}" {{ isset($defaultValue) && $defaultValue == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        @endif
    </select>
    @if(isset($id) && isset($label))
        <label for="{{ $id }}">{{ $label }}</label>
    @endif
</div>

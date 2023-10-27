{{--@dump($attributes)--}}
{{--<div class="card text-center {{ $attributes['class'] }}">--}}
<div {{ $attributes->class('card m-3 text-center') }}>
    @if(isset($title))
        <div class="card-header">{{ $title }}</div>
    @endif
    @if(isset($content))
        <div class="card-body">{{ $content }}</div>
    @endif
    @if(isset($footer))
        <div class="card-footer text-body-secondary">{{ $footer }}</div>
    @endif
</div>

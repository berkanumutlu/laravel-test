<div class="card my-3">
    <div class="card-header">
        <h3><a href="{{ route('article.show', ['article' => $item]) }}">{{ $title }}</a></h3>
        <h6>{{ $subtitle }}</h6>
    </div>
    <div class="card-body">{{ $content }}</div>
</div>

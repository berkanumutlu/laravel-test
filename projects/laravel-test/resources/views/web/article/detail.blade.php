@extends("web.layouts.index")
@section("style")

@endsection
@section("content")
    <div class="container">
        <div class="row">
            @if(!empty($record))
                <h1>{{ $record->title }}</h1>
                <p>{!! $record->body !!}</p>
            @endif
        </div>
    </div>
@endsection
@section("scripts")

@endsection

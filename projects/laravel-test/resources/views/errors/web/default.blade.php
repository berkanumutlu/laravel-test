@extends("web.layouts.index")
@section("style")

@endsection
@section("content")
    <div class="container error-container">
        <h1 class="display-1">{{ $title ?? 'Error' }}</h1>
        <p>{{ $message ?? 'Error message' }}</p>
    </div>
@endsection
@section("scripts")

@endsection

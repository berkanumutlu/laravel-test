@extends("web.layouts.index")
@section("head")

@endsection
@section("content")
    <div class="container">
        <div class="row">
            @foreach($article_list as $item)
                <div class="col-lg-4">
                    <x-article>
                        <x-slot name="title">{{ $item->title }}</x-slot>
                        <x-slot:subtitle>{{ $item->slug_name }}</x-slot:subtitle>
                        <hr>
                        <x-slot name="content">{{ $item->body }}</x-slot>
                    </x-article>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section("scripts")

@endsection

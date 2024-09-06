@extends("web.layouts.index")
@section("style")

@endsection
@section("content")
    <div class="container">
        <div class="row">
            @if($records->isNotEmpty())
                @foreach($records as $item)
                    <div class="col-lg-4">
                        <x-article :item="$item">
                            <x-slot name="title">{{ $item->title }}</x-slot>
                            <x-slot:subtitle>{{ $item->slug }}</x-slot:subtitle>
                            <hr>
                            <x-slot name="content">{!! $item->body !!}</x-slot>
                        </x-article>
                    </div>
                @endforeach
                @if($records->lastPage() > 1)
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        Showing {{ $records->currentPage() == 1 ? $records->currentPage() : $records->currentPage() * $records->perPage() - $records->perPage() + 1 }}
                        to {{ $records->currentPage() * $records->perPage() > $records->total() ? $records->total() : $records->currentPage() * $records->perPage() }}
                        of {{ $records->total() }} records
                        {{ $records->onEachSide(1)->links() }}
                    </div>
                @endif
            @else
                <p>{{ __('alert.articles_not_found') }}</p>
            @endif
        </div>
    </div>
@endsection
@section("scripts")

@endsection

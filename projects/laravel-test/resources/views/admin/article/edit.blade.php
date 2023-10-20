@extends("admin.layouts.index")
@section("head")

@endsection
@section("content")
    <h1>Article Edit</h1>
    <hr>
    <div class="col-8 mx-auto">
        <form action="{{ route("admin.article.edit", ['id' => 11]) }}" method="POST">
            @csrf
            <label for="title">Title</label> <input type="text" class="form-control" name="title" id="title"> <br> <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content"></textarea> <br>
            <button class="btn btn-info" type="submit">Save</button>
        </form>
    </div>
    <hr>
    <a href="{{ route("admin.article.destroy", ['id' => 11]) }}">Delete Article</a>
    <br>
@endsection
@section("scripts")

@endsection

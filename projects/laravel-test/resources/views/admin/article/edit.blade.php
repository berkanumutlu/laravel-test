@extends("admin.layouts.index")
@section("style")
    <link href="{{ asset('assets/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection
@section("content")
    <h1>{{ $title ?? '' }}</h1>
    <hr>
    <div class="col-8 mx-auto">
        <div class="card my-5">
            <div class="card-header">
                <h1>{{ $title ?? '' }}</h1>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0 p-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route("admin.article.edit", ['id' => 1]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                               value="{{ old('title') ?? ($record->title ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug"
                               value="{{ old('slug') ?? ($record->slug ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="body">Content</label>
                        <textarea class="summernote form-control" name="body" id="body"
                                  required>{!! old('body') ?? ($record->body ?? '') !!}</textarea>
                    </div>
                    @if(!empty($category_list))
                        <div class="mb-3">
                            <select class="form-select" name="category_id" aria-label="Category">
                                <option value="{{ null }}">Category</option>
                                @foreach($category_list as $item)
                                    <option value="{{ $item->id }}"
                                        {{ (old('category_id') && old('category_id') == $item->id) || (isset($record) && $record->category_id == $item->id) ? 'selected' : '' }}
                                    >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="is_active"
                               name="is_active" {{ old('is_active') || !empty($record->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Status</label>
                    </div>
                    @can('admin-update-article', $record)
                        <button class="btn btn-info text-white" type="submit">Save</button>
                    @elsecan('view', $record)
                        <a href="{{ route('posts.show', $record) }}">Görüntüle</a>
                    @else
                        <p>You do not have permission to edit the record.</p>
                    @endcan

                    @canany(['update', 'view', 'delete'], $record)
                        <!-- The current user can update, view, or delete the post... -->
                    @elsecanany(['create'], \App\Models\Article::class)
                        <!-- The current user can create a post... -->
                    @endcanany
                </form>
            </div>
        </div>
    </div>
    <hr>
    <a href="{{ route("admin.article.delete", ['id' => 11]) }}">Delete Article</a>
    <br>
@endsection
@section("scripts")
    <script src="{{ asset('assets/plugins/summernote/summernote.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                lang: 'tr-TR',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                height: 200
            });
        });
    </script>
@endsection

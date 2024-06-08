@extends("web.layouts.index")
@section("style")

@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Register Page</h1>
                <hr>
            </div>
            <div class="col-12">
                <form action="{{ route('register') }}" method="POST" style="margin: 0 auto;max-width: 50%;">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled m-0 p-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="my-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required
                               value="{{ old('name') ?? '' }}">
                    </div>
                    <div class="my-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required
                               value="{{ old('email') ?? '' }}">
                    </div>
                    <div class="my-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required
                               placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                    </div>
                    <div class="my-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control" required
                               placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-info">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("scripts")

@endsection

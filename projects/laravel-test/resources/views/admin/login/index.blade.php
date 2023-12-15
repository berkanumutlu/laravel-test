@extends("admin.layouts.index")
@section("style")

@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card my-5">
                    <div class="card-header">Admin Login Form</div>
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
                        <form action="{{ route('admin.login.index') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="signInEmail"
                                       placeholder="name@example.com" value="{{ old('email') }}" required>
                                <label for="signInEmail">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="signInPassword"
                                       placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required>
                                <label for="signInPassword">Password</label>
                            </div>
                            <div class="form-check form-check-reverse form-switch mb-3">
                                <input type="checkbox" class="form-check-input" role="switch"
                                       name="remember_me"
                                       id="signInRememberMe" {{ old('remember_me') ? 'checked' : '' }}>
                                <label class="form-check-label" for="signInRememberMe">Remember me</label>
                            </div>
                            <div class="d-flex justify-content-lg-end mb-3">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">Footer</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")

@endsection

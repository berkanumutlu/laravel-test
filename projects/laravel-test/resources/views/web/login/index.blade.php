@extends("web.layouts.index")
@section("style")

@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Login Page</h1>
                <hr>
            </div>
            <div class="col-12">
                @if($is_logged_in)
                    <div class="d-flex flex-column align-items-center">
                        <p class="mb-0 fs-3">You're logged as <strong>{{ auth()->guard('web')->user()->name }}</strong>
                        </p>
                        <a href="{{ route('logout') }}">Log out</a>
                    </div>
                @else
                    <form action="{{ route('login') }}" method="POST" style="margin: 0 auto;max-width: 50%;">
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
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                   value="{{ old('email') }}">
                        </div>
                        <div class="my-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                        </div>
                        <div class="form-check my-3">
                            <input class="form-check-input" type="checkbox" id="signInRememberMe"
                                   name="remember_me" {{ old('remember_me') ? 'checked' : '' }}>
                            <label class="form-check-label" for="signInRememberMe">Remember me</label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-info text-white">Login</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
@section("scripts")

@endsection

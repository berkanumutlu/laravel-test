<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Berkan Ümütlü">
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <title>{{ isset($title) ? $title. ' - Admin Panel' : 'Admin Panel - Laravel Test' }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $favicon ?? '' }}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $favicon ?? '' }}"/>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @yield("head")
    <link href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- Styles -->
    <link href="{{ asset('assets/admin/css/style.min.css') }}" rel="stylesheet"/>
    @yield("style")
</head>
<body class="antialiased">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand"
           href="{{ route('admin.home') }}">{{ 'Admin/'. (auth()->guard('admin')->user()->name ?? '') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.home') ? 'active' : '' }}" aria-current="page"
                       href="{{ route('admin.home') }}">Home</a>
                    {{--<a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>--}}
                    {{--<a class="nav-link {{ request()->route()->getName() == 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>--}}
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.article.add') ? 'active' : '' }}"
                       href="{{ route('admin.article.add') }}">Add Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.article.edit') ? 'active' : '' }}"
                       href="{{ route('admin.article.edit', ['id' => 1]) }}">Edit Article #1</a>
                </li>
                @if(Auth::guard('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link btnUserLogout" href="{{ route('admin.logout', ['id' => 1]) }}">Logout</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('user') ? 'active' : '' }}" href="{{ route('user') }}">User</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false"> Dropdown </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
@yield("content")
<footer>
    Admin Footer
</footer>
<script src="{{ asset('assets/plugins/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/umd_popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
@yield("scripts")
</body>
</html>

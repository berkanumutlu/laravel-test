<!doctype html>
<html lang="{{ $current_language->code }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? $title. ' - '.$site_name : $site_slogan.' - '.$site_name }}</title>
    @yield("head")
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/style.min.css') }}">
    @yield("style")
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page"
                       href="{{ route('home') }}">{{ __('global.home') }}</a>
                    {{--<a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>--}}
                    {{--<a class="nav-link {{ request()->route()->getName() == 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>--}}
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('about.us') ? 'active' : '' }}"
                       href="{{ LaravelLocalization::getURLFromRouteNameTranslated($current_language->code, 'routes.about_us') }}">{{ __('global.about_us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('article.list') ? 'active' : '' }}"
                       href="{{ route('article.list') }}">{{ __('global.articles') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('contact') ? 'active' : '' }}"
                       href="{{ route('contact') }}">{{ __('global.contact') }}</a>
                </li>
                @auth('web')
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('user') ? 'active' : '' }}"
                           href="{{ route('user') }}">{{ __('global.user') }}</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('login') ? 'active' : '' }}"
                       href="{{ route('login') }}">{{ __('global.login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('register') ? 'active' : '' }}"
                       href="{{ route('register') }}">{{ __('global.register') }}</a>
                </li>
                @if(!empty($languages))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false"> {{ $current_language->code ?? '' }} </a>
                        <ul class="dropdown-menu">
                            @foreach($languages as $language)
                                <li>
                                    <a href="{{ $language->url }}" class="dropdown-item">{{ $language->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="{{ __('global.search') }}"
                       aria-label="{{ __('global.search') }}">
                <button class="btn btn-outline-success" type="submit">{{ __('global.search') }}</button>
            </form>
        </div>
    </div>
</nav>
<div class="content">
    @yield("content")
</div>
<footer class="container-fluid bg-light">
    <div class="container text-center">
        <p class="mb-0">Copyright © 2023 Berkan Ümütlü. All Right Reserved.</p>
    </div>
</footer>
<script src="{{ asset('assets/plugins/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/umd_popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
@include('sweetalert::alert')
@yield("scripts")
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}">
    @yield("head")
</head>
<body>
Header
@yield("content")
Footer
<script src="{{ asset('assets/plugins/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/umd_popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
@yield("scripts")
</body>
</html>

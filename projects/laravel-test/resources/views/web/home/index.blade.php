@extends("web.layouts.index")
@section("head")

@endsection
@section("content")
    <p>Home Page Content</p>
    <p>Name: {{ $name ?? 'No Data' }}</p>
    <p>Age: {{ $age ?? 'No Data' }}</p>
    <p>Name: {{ $person->name ?? 'No Data' }}</p>
    <p>Age: {{ $person->age ?? 'No Data' }}</p>
@endsection
@section("scripts")

@endsection

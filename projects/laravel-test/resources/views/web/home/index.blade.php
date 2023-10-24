@extends("web.layouts.index")
@section("head")

@endsection
@section("content")
    <p>Home Page Content</p>
    <p>Global current language: {{ $current_language ?? 'No Data' }}</p>
    <p>Global data person: {{ $persona->name ?? 'No Data' }}</p>
    <p>Name: {{ $name ?? 'No Data' }}</p>
    <p>Age: {{ $age ?? 'No Data' }}</p>
    @if(isset($person))
        @if(isset($person->name))
            <p>Name: {{ $person->name }}</p>
        @else
            <p>Name: No Data</p>
        @endif
        @if(isset($person->age))
            <p>Age:
                @switch($person->age)
                    @case(10)
                        Kid
                        @break
                    @case(25)
                        Young
                        @break
                    @case(35)
                        Adult
                        @break
                @endswitch
            </p>
        @endif
    @endif
    <hr>
    <h6>Custom Directive</h6>
    <form action="" method="POST">
        @csrf
        @method("DELETE")
        @customMethod("berkan")
        <input type="text" name="fullname">
        <button type="submit">Send</button>
    </form>
    <hr>
@endsection
@section("scripts")

@endsection

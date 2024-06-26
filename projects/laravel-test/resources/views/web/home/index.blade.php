@extends("web.layouts.index")
@section("style")

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
    <x-input-text :type="'text'" :id="'fullname'" :name="'fullname'" :class="'form-control'" :label="'Ad Soyad'"
                  :placelholder="'Ad Soyad'"/>
    <hr>
    @php
        $color = "info";
    @endphp
    <x-input-text2 :type="'text'" :name="'fullname2'" class="bg-" :color="$color" :error="false"/>
    <hr>
    <h6>Custom Helper</h6>
    <p>Date: @php echo date('Y-m-d H:i:s'); @endphp</p>
    <p>Formatted Date: @php echo date_format_custom(date('Y-m-d H:i:s')); @endphp</p>
    <div class="m-l-5">
        <p>{{ App::isLocale('en') }}</p>
        <p>{{ App::currentLocale() }}</p>
        <p>{{ App::getLocale() }}</p>
        <p>{{ app()->currentLocale() }}</p>
        <p>{{ app()->getLocale() }}</p>
        <p>{{ Config::get('app.locale') }}</p>
        <p>{{ config()->get('app.locale') }}</p>
    </div>
@endsection
@section("scripts")

@endsection

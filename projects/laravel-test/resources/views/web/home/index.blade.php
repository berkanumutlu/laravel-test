@extends("web.layouts.index")
@section("style")

@endsection
@section("content")
    <div class="container">
        <div>
            <h6>Compact variable</h6>
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
        </div>
        <hr>
        <div>
            <h6>Custom Directive</h6>
            <form action="" method="POST">
                @csrf
                @method("DELETE")
                @customMethod("berkan")
                <input type="text" name="fullname">
                <button type="submit">Send</button>
            </form>
        </div>
        <hr>
        <div>
            <h6>Component Data Pass/Attributes/Slot</h6>
            <x-input-text :type="'text'" :id="'fullname'" :name="'fullname'" :class="'form-control'" :label="'Ad Soyad'"
                          :placelholder="'Ad Soyad'"/>
        </div>
        <hr>
        <div>
            <h6>Component Data Pass/Attributes/Slot</h6>
            @php
                $color = "info";
            @endphp
            <x-input-text2 :type="'text'" :name="'fullname2'" class="bg-" :color="$color" :error="false"/>
        </div>
        <hr>
        <div>
            <h6>Custom Helper</h6>
            <p>Date: @php echo date('Y-m-d H:i:s'); @endphp</p>
            <p>Formatted Date: @php echo date_format_custom(date('Y-m-d H:i:s')); @endphp</p>
        </div>
        <hr>
        <div>
            <h6>Current Language</h6>
            <p>App::isLocale('en'): {{ App::isLocale('en') }}</p>
            <p>App::currentLocale(): {{ App::currentLocale() }}</p>
            <p>App::getLocale(): {{ App::getLocale() }}</p>
            <p>app()->currentLocale(): {{ app()->currentLocale() }}</p>
            <p>app()->getLocale(): {{ app()->getLocale() }}</p>
            <p>Config::get('app.locale'): {{ Config::get('app.locale') }}</p>
            <p>config()->get('app.locale'): {{ config()->get('app.locale') }}</p>
        </div>
        <hr>
        <div>
            <h6>Maintenance Mode</h6>
            <p>To enable maintenance mode: <code>php artisan down</code></p>
            <p>Refresh page after 15 seconds:<br>
                <code>php artisan down --refresh=15</code><br>
                <code>php artisan down --retry=60</code></p>
            <p>Bypassing Maintenance Mode:<br>
                <code>php artisan down --secret="1630542a-246b-4b66-afa1-dd72a4c43515"</code><br>
                <code>https://example.com/1630542a-246b-4b66-afa1-dd72a4c43515</code><br>
                <code>php artisan down --with-secret</code>
            </p>
            <p>Pre-Rendering the Maintenance Mode View:<br>
                <code>php artisan down --render="errors::503"</code><br>
                <code>php artisan down --redirect=/</code>
            </p>
            <p>Disabling Maintenance Mode: <code>php artisan up</code>
            </p>
        </div>
        <hr>
        <div>
            <h6>Current Route</h6>
            <p><strong>Route::current() (\Illuminate\Routing\Route):</strong> @dump(Route::current())</p>
            <p><strong>Route::currentRouteName() (string):</strong> {{ Route::currentRouteName() }}</p>
            <p><strong>Route::currentRouteAction() (string):</strong> {{ Route::currentRouteAction() }}</p>
        </div>
    </div>
@endsection
@section("scripts")

@endsection

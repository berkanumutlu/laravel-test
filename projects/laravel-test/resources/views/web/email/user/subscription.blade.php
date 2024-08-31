@extends("layouts.email")
@section("head")

@endsection
@section("content")
    <div class="text-center">
        <p class="m-0">Hey <strong>{{ $user->name }}</strong>,<br><br>Thank you for subscribing to our bulletin!
            <br><br><br><br><br>Best Regards,<br>{{ $site_name }}
        </p>
    </div>
@endsection
@section("scripts")

@endsection

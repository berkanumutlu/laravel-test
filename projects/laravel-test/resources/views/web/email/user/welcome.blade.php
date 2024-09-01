@extends("layouts.email")
@section("style")

@endsection
@section("content")
    <div class="text-center">
        <p class="m-0">Hey <strong>{{ $user->name }}</strong>,<br><br>Thank you for registering to our website! Welcome!
            <br><br><br><br><br>Best Regards,<br>{{ $site_name }}
        </p>
    </div>
@endsection
@section("scripts")

@endsection

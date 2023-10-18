@extends("web.layouts.index")
@section("head")

@endsection
@section("content")
    <h1>Contact Page</h1>
    <hr>
    <div class="col-8 mx-auto">
        <h6>Contact Form</h6>
        <form action="{{ route('contact') }}" method="POST">
            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
            @csrf
            <input type="text" class="form-control" name="fullname"> <br> <input type="email" class="form-control" name="email"> <br>
            <button class="btn btn-success" type="submit">Send</button>
        </form>
        <hr>
    </div>
    <div class="col-8 mx-auto">
        <h6>User Form</h6>
        <form action="{{ route('contact_user_form', ['id'=>5, 'name'=>'berkan']) }}" method="POST">
            @csrf
            <label for="fullname">Full Name</label> <input type="text" class="form-control" name="fullname" id="fullname"> <br>
            <label for="email">Email</label><input type="email" class="form-control" name="email" id="email">
            <br><label for="company">Company</label><input type="text" class="form-control" name="company" id="company"> <br>
            <button class="btn btn-success" type="submit">Send</button>
        </form>
        <hr>
    </div>
@endsection
@section("scripts")

@endsection

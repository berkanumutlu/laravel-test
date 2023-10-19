@extends("web.layouts.index")
@section("head")

@endsection
@section("content")
    <h1>User Page</h1>
    <div class="col-8 mx-auto">
        <hr>
        <h6>PATCH</h6>
        <form action="{{ route('user.update', ['id' => 3]) }}" method="POST">
            @csrf
            @method("PATCH")
            {{--{{ method_field('PATCH') }}--}}
            {{--<input type="hidden" name="_method" value="PATCH">--}}
            <label for="email">Email</label><input type="email" class="form-control" name="email" id="email"><br>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
        <hr>
        <h6>PUT</h6>
        <form action="{{ route('user.update_all', ['id' => 3]) }}" method="POST">
            @csrf
            @method("PUT")
            <label for="fullname">Full Name</label> <input type="text" class="form-control" name="fullname" id="fullname"> <br>
            <label for="email">Email</label><input type="email" class="form-control" name="email" id="email">
            <br><label for="company">Company</label><input type="text" class="form-control" name="company" id="company">
            <br><label for="website">Web Site</label><input type="text" class="form-control" name="website" id="website"> <br>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
        <hr>
        <form action="{{ route('user.delete', ['id' => 3]) }}" method="POST">
            @csrf
            @method("DELETE")
            <button class="btn btn-danger" type="submit">Delete User</button>
        </form>
    </div>
@endsection
@section("scripts")

@endsection

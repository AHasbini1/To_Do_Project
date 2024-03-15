@extends('layout.app')
@section('content')

<form action='/register' method='post'>
        @csrf
    <div>
        <label for="first_name" class="form-label">First Name</label>
        <input type="first_name" class="form-control" id="first_name" name='first_name' value="{{old('first_name')}}">
        @error('first_name')
                <p class=text-danger >{{$message}}</p>
            @enderror
    </div>
    <div>
        <label for="last_name" class="form-label">Last Name</label>
        <input type="last_name" class="form-control" id="last_name" name='last_name' value="{{old('last_name')}}">
        @error('last_name')
                <p class=text-danger >{{$message}}</p>
            @enderror
    </div>
    <div>
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name='email' value="{{old('email')}}">
        @error('email')
                <p class=text-danger >{{$message}}</p>
            @enderror
    </div>
    <div>
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name='password' value="{{old('password')}}">
        @error('password')
                <p class=text-danger >{{$message}}</p>
            @enderror
    </div>
    <div>
        <label for="password_confirmation " class="form-label">password_confirmation</label>
        <input type="password" class="form-control" id="password_confirmation " name='password_confirmation' value="{{old('password_confirmation')}}">
        @error('password_confirmation')
                <p class=text-danger >{{$message}}</p>
            @enderror
    </div>
    <div class='text-center'>
        <button type='submit' class="btn btn-primary">Register</button>
    </div>
</form>
@endsection
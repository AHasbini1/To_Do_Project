@extends('layout.app')
@section('content')

<form action='/login' method='post'>
        @csrf
    <div>
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" >
        @error('email')
                <p class=text-danger >{{$message}}</p>
            @enderror
    </div>

    <div>
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
        @error('password')
                <p class=text-danger >{{$message}}</p>
            @enderror
    </div>
    <div class='text-center'>
        <button type='submit' class="btn btn-outline-primary">Login</button>
    </div>
</form>
@endsection


@extends('layout.app')
@section('content')
<h1>
    Editing List  adam <br>
    
    <!----{{$list->name}}({{$list->id}})-------> 
    <br/>
</h1>

<form method='POST' action ='/project-list/{{$list->id}}'>
    @csrf
    @method ('PUT') 
         <div>
            <label 
             class='form-label'>
            Name</label>
            <input type="text" class='form-control' id=name name='name' value='{{$list->name}}'/>
            @error('name')
                <p class=text-danger >{{$message}}</p>
            @enderror
         </div>   
        <div class= 'text-center'><button class='btn btn-outline-primary'>Save</button>
            <!--<button class ='btn btn-secondary'>Reset</button> -->
        </div> 
         </form>

@endsection

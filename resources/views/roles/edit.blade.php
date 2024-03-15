
@extends('layout.app')
@section('content')
<h1>
    Editing Role {{$role->description}}({{$role->id}})
    
</h1>

<form method='POST' action ='/roles/{{$role->id}}'>
    @csrf
    @method ('PUT') 
         <div>
            <label 
             class='form-label'>
            Description</label>
            <input type="text" class='form-control' id=description name='description' value='{{$role->description}}'/>
            @error('description')
                <p class=text-danger >{{$message}}</p>
            @enderror
         </div>   
        <div class= 'text-center'><button class='btn btn-primary'>Save</button>
            <!--<button class ='btn btn-secondary'>Reset</button> -->
        </div> 
         </form>

@endsection

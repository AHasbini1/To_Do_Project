Description<!-- 7/18/22
added bootstrap

wrote data to db table

set rules on handeling null data

added input form with save/reset buttons

created validators for input forms

// use web routes for front end 

// use api.php for backend

next week
 fix get issue
update 
finish roles

HTTP verbs
weather channel API
FORMS MUST BE EITHER GET/POST
AND NEED CSFR TOKEN
!-->


@extends('layout.app')
@section('content')
@include ('roles.createForm')
<h1>
    Roles, Adam is here
    
</h1>
<table class="table table-hover table-striped">
        <thead>
            <th>id</th>
            <th>Description</th>
            <th>Created_at</th>
            <th>Actions</th>
        </thead>
        <tbody>
        @forelse($roles as $role)
<tr>
    <td>
        {{$role->id}}
    </td>
    <td>
        {{$role->description}}
    </td>
    <td>
        {{$role->created_at}}
    </td>
    <td >
        
        <a href='/roles/{{$role->id}}/edit' class="btn btn-primary d-inline">Edit</a>
        <form method="post" action="/roles/{{$role->id}}" class="d-inline"> 
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger d-inline">
            Delete </button>
        </form>

    </td>

</tr>
@empty
<tr>
    <td colspan="4" class='text-center'>Nothing In DB!</td>
</tr>
@endforelse
        </tbody>
</table>

@endsection

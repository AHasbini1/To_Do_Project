<!-- 7/18/22
added bootstrap

wrote data to db table

set rules on handeling null data

added input form with save/reset buttons

created validators for input forms

// use web routes for front end for url routing

// use api.php for backend and data requests

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
@include ('project-list.createForm')
<h1>
        Project-List
    
</h1>
<table class="table table-hover table-striped">
        <thead>
            <th>id</th>
            <th>User</th>
            <th>Name</th>
            <th>Created_at</th>
        </thead>
        <tbody>
        @forelse($projects as $project)
    <tr>
    <td>
        {{$project->id}}
    </td>
    <td>
        {{$project->user->first_name}}
        {{$project->user->last_name}}
    </td>
    <td>
        <a href="/project-list/{{$project->id}}/tasks">
        {{$project->name}}</a>
    </td>
    <td > 
        <a href='/project-list/{{$project->id}}/edit' class="btn btn-primary d-inline">Edit</a>
            <form method="post" action="/project-list/{{$project->id}}" class="d-inline"> 
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger d-inline">Delete </button>            
            </form>
        <a href="/project-list/{{$project->id}}/tasks" class="btn btn-info d-inline">
        tasks</a>
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

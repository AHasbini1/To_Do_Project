@extends('layout.app')
@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awesomeness</title>
</head>
<body>
<p>
    Welcome {{Auth::user()->first_name}} to the Awesome To-Do web App! 
</p>
 
</body>
</html>

@endsection
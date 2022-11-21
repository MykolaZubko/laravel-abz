@extends("layouts.app")
@section('title') Один пользователь
@endsection
@section('content')
    <div>
        <h3>Name: {{$user->name}}</h3>
        <h3>Email: {{$user->email}}</h3>
        <h3>Phone: {{$user->phone}}</h3>
        <h3>Position: {{$position->positions}}</h3>

    </div>
<div>
    <a class="btn btn-primary" href="/users" role="button">Back</a>
</div>
@endsection

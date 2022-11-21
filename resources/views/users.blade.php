@extends("layouts.app")
@section('title')Пользователи
@endsection
@section('content')

    <div>
        <div class="mb-3">
            <a class="btn btn-primary" href="/create/user" role="button">Create</a>
        </div>

        <div style="width: 50%" class="mb-3">
            @foreach($users as $user)
                    <div class="list-group">
                        <a href="/user/{{$user->id}}" class="list-group-item list-group-item-action" aria-current="true">
                          {{$user->name}}
                        </a>
                    </div>
            @endforeach
        </div>
{{--        <div class="mb-3">--}}
{{--            <a class="btn btn-success" href="/more" role="button">Show more</a>--}}
{{--        </div>--}}
        <div>
            {{$users->links()}}
        </div>
    </div>


@endsection

@extends("layouts.app")
@section('title') Создать пользователя
@endsection
@section('content')
    <form method="post" action="/store" style="width: 50%" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="firstname" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"placeholder="Enter email">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"placeholder="Enter phone +380">
        </div>
        <div class="mb-3">
            <label for="position_id" class="form-label">Position</label>
            <select class="form-select" aria-label="Select position" id="position_id" name="position_id">
    {{--            <option selected>Open this select menu</option>--}}
                @foreach($position as $pos)
                    <option value="{{$pos->id}}">{{$pos->positions}}</option>>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input class="form-control" type="file" id="photo" name="photo" >
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a class="btn btn-primary" href="/" role="button">Back</a>
    </form>

@endsection

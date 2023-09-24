@extends('layouts.app')
@section('content')

    <head>
        <title>
        @section('title')
            Comment Trash
        @endsection
    </title>
</head>
<header>
    <p style="font-size: 15px;">Comments Trash</p>
</header>
@if ($message = Session::get('success'))
    <div class="alert  alert-primary" role="alert">
        {{ $message }}
    </div>
@endif
@if ($comments->count() == 0)
    <div class="card-body">
        <h2 class="text-danger"style="text-align: center;margin-top:3%">There is no commments in the trash... </h2>
    </div>
@else
    @foreach ($comments as $comment)
        <div class="card" style="background: #f0f2f5;width:91%;margin-left: 4% ; margin-top:3%; position: relative;">
            <div class="card-body col-md-6">
                <label for="Created_at" style="margin-top:1%;font-size:17px">{{ __($comment->author) }}</label>
                <input id="created_at" type="text" class="form-control" name="created_at"
                    value="{{ $comment->comment }}" required autocomplete="text" autofocus required readonly
                    style="margin-top:2.5%;width: 150%;margin-bottom: 4% ;">
                <a class="btn btn-primary" style="margin-top:2%"href="{{ route('comments.restore',$comment->id) }}">
                    {{ __('Restore') }}
                </a>
                <a class="btn btn-danger" style="margin-left: 4%;margin-top: 2%"
                    href="{{ route('comments.deleteforever', $comment->id) }}">
                    {{ __('Delete') }}
                </a>
            </div>
        </div>
        <div style="margin-left: 4.5% ;margin-top: 2%">
            Deleted From {{ time_from($comment->deleted_at) }}
        </div>
    @endforeach
@endif
@endsection

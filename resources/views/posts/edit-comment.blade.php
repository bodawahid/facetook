@extends('layouts.app')
@section('content')
<div class="container">
    <h1 style="background:blanchedalmond ; border:solid;border-color:blanchedalmond;border-radius:6px ;width: 25%;color: darkgray">{{__('Edit Comment')}}</h1>
    <form method="POST" action="{{route('comments.update',$comment->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group"style="margin-top:2%">
            <input type="text" class="form-control" name="comment" value="{{$comment->comment}}"id="comment" placeholder="Edit the Comment"style="margin-top:3%">
            <input type="text" class="form-control" name="post_id" value="{{$comment->post_id}}"id="comment" placeholder="Edit the Comment"style="margin-top:3%" hidden>
        </div>
        <button type="submit" name="submit" class="btn btn-danger"style="margin-top:3%">Edit</button>
    </form>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 style="background:blanchedalmond ; border:solid;border-color:blanchedalmond;border-radius:6px ;width: 21%;color: darkgray">Create Post</h1>
    <form method="POST" action="{{$isedit?route('posts.update',$post->id):route('posts.store')}}">
        @csrf
        @if($isedit)
        @method('PUT')
        @endif
        <div class="form-group"style="margin-top:2%">
            <label for="title" style="background:blanchedalmond ; border:solid;border-color:blanchedalmond;border-radius:6px ;width: 5%;color: darkgray;font-size: 15px">Title</label>
            <input type="text" class="form-control" name="title" value="{{$isedit?$post->title:old('title')}}"id="title" placeholder="Enter title"style="margin-top:2%">
        </div>
        <div class="form-group"style="margin-top:2%">
            <label for="description" style="background:blanchedalmond ; border:solid;border-color:blanchedalmond;border-radius:6px ;width: 9%;color: darkgray;font-size: 15px">Content</label>
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter content"style="margin-top:2%">{{$isedit?$post->description:old('description')}}</textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-danger"style="margin-top:2%">Submit</button>
    </form>
    @if($errors->any())
    @foreach ($errors->all() as $e )
    <div class="card-body text-danger" style="margin-top: 2% ">
        {{$e}}
    </div>
    @endforeach
    @endif
</div>
@endsection
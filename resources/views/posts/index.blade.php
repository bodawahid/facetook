@extends('layouts.app')
@section('content')
    <html>

    <head>
        <title>
        @section('title')
            HOME
        @endsection
    </title>
</head>
<header>
    <p style="font-size: 15px;">POSTS</p>
</header>
<main>
    @if($message = Session::get('success'))
    <div class="alert alert-primary" role="alert">
        {{$message}}
      </div>
    @endif
    @if ($posts->count() == 0)
        <div class="card-body">
            <h2 style="text-align: center">There is no posts .. Create one what do you wait !!</h2>
        </div>
    @else
        @foreach ($posts as $post)
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10" style="margin-right: 24% ; margin-top: 2%">
                        <div class="card" style="width:130%;">
                            <div class="card-header">
                                {{ __('Post Number ') . $post->id }}
                            </div>
                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end"style="margin-top:3%">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title"
                                        value="{{ $post->title }}" required autocomplete="text" autofocus required
                                        readonly style="margin-top:5.5%">
                                </div>
                                <label for="description" class="col-md-4 col-form-label text-md-end"
                                    style="margin-top:1%">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control" name="description" required autocomplete="text" autofocus
                                        required readonly style="margin-top:2.5%">{{ $post->description }}</textarea>
                                </div>
                                <label for="Created_at"
                                    class="col-md-4 col-form-label text-md-end"style="margin-top:1%">{{ __('created at') }}</label>

                                <div class="col-md-6">
                                    <input id="created_at" type="text" class="form-control" name="created_at"
                                        value="{{ $post->created_at }}" required autocomplete="text" autofocus required
                                        readonly style="margin-top:2.5%">
                                </div>
                                {{-- @if ($post->created_at != $post->updated_at)
                                    <label for="description"
                                        class="col-md-4 col-form-label text-md-end"style="margin-top:1%">{{ __('updated_at') }}</label>
                                    <div class="col-md-6">
                                        <input id="updated_at" type="text" class="form-control" name="updated_at"
                                            value="{{ $post->updated_at }}" required autocomplete="text" autofocus
                                            required readonly style="margin-top:2.5%">
                                @endif --}}
                                <p class="text-black"style="margin-left:20%;margin-top:3%">written by :
                                    <a href="{{route('posts.index',$post->author)}}">{{$post->author}}</a> <pre style="margin-top: 1%">                   From  {{time_from($post->created_at)}}</pre> </p>
                            </div>
                            <div class="card"
                                style="width: 18% ;background: rgb(248, 243, 243) ;margin: 2%; justify-content: center">
                                <a href="{{ route('posts.show', $post->id) }}"
                                    style="text-decoration:none ;color:black">Show
                                    Comments</a>
                            </div>
                            @if ($post->user_id == Auth::user()->id)
                                <div class="card"
                                    style="width: 7%;background: rgb(248, 243, 243) ;margin: 2%; justify-content: center; border-radius: 5px ">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        style="text-decoration: none;text-align: center; background: rgb(248, 243, 243) ; color: black;border-radius: 5px ">Edit</a>
                                </div>
                                {{-- <div class="card"
                                    style="width: 11%;background: rgb(248, 243, 243) ;margin: 2%; justify-content: center">
                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button name="delete" type="submit"
                                            style="border: none ; background:  rgb(248, 243, 243) ;border-radius: 5px">
                                            DELETE
                                        </button>
                                    </form>
                                </div> --}}
                                <div class="card"
                                    style="width: 12%;background: rgb(248, 243, 243) ;margin: 2%; justify-content: center">
                                        <a  class="btn btn-warning" name="softDelete" href="{{route('soft.delete',$post->id)}}"
                                        style="border: none ; background:  rgb(248, 243, 243) ;border-radius: 5px;">
                                        Delete
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        {{-- <div class="card-body">
        {{!! $posts->links() !!}}
        </div> --}}
    @endif
</main>
</body>

</html>
@endsection

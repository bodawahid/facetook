@extends('layouts.app')
@section('content')
    <html>

    <head>
        <title>
        @section('title')
            Posts Trash
        @endsection
    </title>
</head>
<header>
    <p style="font-size: 15px;">Posts Trash</p>
</header>
<main>

    @if ($message = Session::get('success'))
        <div class="alert alert-primary" role="alert">
            {{ $message }}
        </div>
    @endif
    @if ($posts->count() == 0)
        <div class="card-body">
            <h2 class="text-danger"style="text-align: center">There is no posts in the trash... </h2>
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
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end"style="margin-top:1%">{{ __('deleted_at') }}</label>
                                <div class="col-md-6">
                                    <input id="deleted_at" type="text" class="form-control" name="deleted_at"
                                        value="{{ $post->deleted_at }}" required autocomplete="text" autofocus required
                                        readonly style="margin-top:3%">
                                    <p class="text-black"style="margin-top:5%">Deleted by :
                                        <a href="{{ route('posts.index', $post->author) }}">{{ $post->author }}</a>
                                        <pre style="margin-top: 3.5%">From  {{ time_from($post->deleted_at) }}</pre>
                                    </p>
                                </div>
                                <div class="card-body" style="margin-left: 69%" >
                                <a class="btn btn-primary" style="margin-top:2%"href="{{ route('posts.restore', $post->id) }}">
                                    {{ __('Restore') }}
                                </a>
                                <a class="btn btn-danger" style="margin-left: 8%;margin-top: 2%"
                                    href="{{ route('posts.deleteforever', $post->id) }}">
                                    {{ __('Delete') }}
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endforeach

        {{-- <div class="card-body">
        {{!! $posts->links() !!}}
        </div> --}}
    @endif
</main>
</body>

</html>
@endsection

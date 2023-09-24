@extends('layouts.app')
@section('content')
    <html>

    <head>
        <title>
        @section('title')
            Comments
        @endsection
    </title>
</head>
<header>
    <p style="font-size: 15px;">Comments Section</p>
</header>
<main>
    @if($message = Session::get('success'))
    <div class="alert  alert-primary" role="alert">
        {{$message}}
    </div>
    <div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="margin-right: 24% ; margin-top: 2%">
                <div class="card" style="width:130%;">
                    <div class="card-header" style="height:50px">
                        @if ($post->author == Auth::user()->name)
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown">
                                    <p style="width:50%;">{{ __('Written by : ') . Str::ucfirst($post->author) }}</p>
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre
                                        style="padding:0px;width: 1.5%;text-align: center;margin-left: 99%;margin-bottom: 0% ">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">
                                            {{ __('Edit Post') }}
                                        </a>
                                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button style="background: #f8f9fa; border: #f8f9fa; margin-left: 6% "
                                                name="delete" type="submit">
                                                DELETE
                                            </button>
                                        </form>
                                    </div>

                                </li>
                            </ul>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <label for="title"
                            class="col-md-4 col-form-label text-md-end"style="margin-top:3%">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title"
                                value="{{ $post->title }}" required autocomplete="text" autofocus required readonly
                                style="margin-top:5.5%">
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
                                value="{{ $post->created_at }}" required autocomplete="text" autofocus required readonly
                                style="margin-top:2.5%">
                        </div>
                        <div class="card-body" style="margin-top: 2%;border:none ">
                            <form method="POST" action="{{ route('comments.store') }}">
                                @csrf
                                {{-- <label for="Created_at"
                                class="col-md-4 col-form-label text-md-end"style="margin-top:1%">{{ __('Share') }}</label>
        
                                <div class="col-md-6" style="margin-top:2%">
                                    <select name="share[]" id="share" multiple>
                                    @foreach (App\Models\User::all()->except(Auth::user()->id) as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach    
                                    </select>
                                </div> --}}
                                <label for="comment" style="font-size: 15px;margin-left:1%">Add Comment </label>
                                <input id="comment" type="text" class=""
                                    style="width: 75%;margin-left: 5px;border-radius:5px; border-width: 1px; border-color:#8e9499 ;background: #f8fafc"
                                    name="comment" placeholder="Write a Comment" required autocomplete="text"
                                    autofocus required style="margin-top:2.5%">
                                    <button type="submit" name="submit" class="btn btn-light"><span id="boot-icon" class="bi bi-send" style="font-size: 12px; opacity: 1; -webkit-text-stroke-width: 5px;color: blue"></span>
                                    </button>
                                    <input name="id" value="{{$post->id}}" hidden>
                            </form>
                        </div>
                        <hr style="width: 96.56%;margin-left:1.85%;">
                        <p  class="text-danger"style="text-align: center;font-size:19px">comments</p>
                        <hr style="width: 96.56%;margin-left:1.85% ">
                        <?php $flag = 0 ;  ?> 
                        @foreach(App\Models\comment::all() as $comment)
                        @if($comment->post_id == $post->id)
                        <?php $flag = 1  ; ?>
                        <div class="card" style="background: #f0f2f5;width:91%;margin-left: 4% ; position: relative;">
                        <label for="Created_at"
                            style="width: 15%;margin-top:1%;font-size:17px">{{ __($comment->author) }}</label>
                        <div class="col-md-6">
                            <input id="created_at" type="text" class="form-control" name="created_at"
                                value="{{ $comment->comment }}" required autocomplete="text" autofocus required readonly
                                style="margin-top:2.5%;width: 150%;margin-bottom: 4% ;">
                                @if ($comment->user_id == Auth::user()->id)
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre
                                            style="padding:0px;width: 1.5%;text-align: center;margin-left: 198%;margin-bottom: 0% ">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('comments.edit', $comment->id) }}">
                                                {{ __('Edit comment') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('softcom.delete', $comment->id) }}">
                                                {{ __('Soft Delete') }}
                                            </a>
                                            {{-- <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button style="background: #f8f9fa; border: #f8f9fa; margin-left: 8% "
                                                    name="delete" type="submit">
                                                    DELETE
                                                </button>
                                            </form> --}}
                                        </div>
    
                                    </li>
                                </ul>
                            @endif
                        </div>
                        </div>
                        <div style="margin-left: 2% ;">
                            <button type="submit" name="submit" class="btn btn-light">Reply</button>
                            From
                             {{time_from($comment->created_at)}}
                        </div>
                        @endif
                    @endforeach
                    @if($flag == 0)
                    <div class="card-body">
                    <p class="text-danger" style="text-align: center">There is no comments .. Write a new one what do you wait ?</p>
                    </div> 
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

</html>
@endsection

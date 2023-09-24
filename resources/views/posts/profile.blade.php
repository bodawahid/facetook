@extends('layouts.app')
@section('content')
<header>
    <h2>{{__('Profile Page')}}</h2>
</header>
<main>
    <!!DOCTYPE html lang="en">
    <head>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    
    <div class="container">
    <div class="row">
    <div class="col-md-4">
    <img src="https://drive.google.com/file/d/1vnZRkydQauhffIfoB3B4nx-qI5o-B6aU/view?usp=drive_link" alt="Profile Picture" class="img-fluid">
    </div>
    <div class="col-md-8">
    <h1>{{$user->name}}</h1>
    <p>Email:{{$user->email}}</p>
    <p>Location: New York, USA</p>
    <p>Bio: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget blandit sapien. Ut elit ligula, dignissim vel justo a, tristique vestibulum nisl.</p>
    </div>
    </div>
    </div>
    
    Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </body>
    </html>
</main>
@endsection
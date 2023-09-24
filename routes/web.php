<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});
// Route::get('/posts/{user}',[App\Http\Controllers\PostController::class,'user'])->name('posts.user') ;
Route::resource('posts',App\Http\Controllers\PostController::class) ; 
Route::get('post/soft/delete/{id}',[App\Http\Controllers\PostController::class,'softDelete'])->name('soft.delete') ;
Route::get('/post/username/{name}',[App\Http\Controllers\PostController::class,'user'])->name('post.user')  ;
Route::get('post/comment/soft/delete/{id}',[App\Http\Controllers\CommentController::class,'softDelete'])->name('softcom.delete') ;
Route::get('post/trash',[App\Http\Controllers\PostController::class,'trash'])->name('posts.trash') ;
Route::get('post/restore/{id}',[App\Http\Controllers\PostController::class,'restore'])->name('posts.restore') ;
Route::get('post/force/delete/{id}',[App\Http\Controllers\PostController::class,'deleteforever'])->name('posts.deleteforever') ;
Route::get('/comment/trash',[App\Http\Controllers\CommentController::class,'trashcom'])->name('comments.trash');
Route::get('/comment/restore/{id}',[App\Http\Controllers\CommentController::class,'restore'])->name('comments.restore') ;
Route::get('/comment/delete/for/ever{id}',[App\Http\Controllers\CommentController::class,'deleteforever'])->name('comments.deleteforever') ;
// Route::get('/post/profile/{id}',[\App\Http\Controllers\PostController::class,'profile'])->name('posts.profile') ;  
Route::get('/profile',[App\Http\Controllers\ProfileController::class,'index'])->name('profile.show');
Route::get('/profile/update',[App\Htpp\Controllers\ProfileController::class,'update'])->name('profile.update');
Auth::routes(['verify'=>true]);
Route::resource('comments',App\Http\Controllers\CommentController::class) ;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

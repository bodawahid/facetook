<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = post::latest()->paginate(100) ;  
        // dd(Auth::user()->posts) ; 
        return view('posts.index',compact('posts')) ;  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $isedit = false ; 
        return view('posts.create-edit',compact('isedit')) ; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title'=>'required|max:50',
        'description'=>'required|min:8']) ; 
        $post = new post() ; 
        $post->title = $request->title ; 
        $post->description = $request->description ; 
        $post->author = Auth::user()->name ; 
        $post->user_id = Auth::user()->id ; 
        $post->save() ; 
        return redirect(route('posts.index'))->with('success','Post added successfully') ;  
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        return view('posts.show',compact('post')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        $isedit = true ;
        return view('posts.create-edit',compact('post','isedit')) ; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        $request->validate(['title'=>'required|max:50',
        'description'=>'required|min:8']) ; 
        $post->title = $request->title ; 
        $post->description = $request->description ; 
        $post->author = Auth::user()->name ;  
        $post->user_id = Auth::user()->id ; 
        $post->update() ; 
        return redirect(route('posts.index'))->with('success','Post Updated Successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        $post->delete() ; 
        return redirect(route('posts.index'))->with('success','Post Deleted Successfully') ; 
    }
    
    public function softDelete($id)  
    {
        $post = post::find($id)->delete() ; 
        return redirect(route('posts.index'))->with('success','Post is deleted Successfully') ;
    }
    // public function user($name)
    // {
    //     $user = User::find($name)->get() ; 
    //     return view('posts.profile',compact('user')) ; 
    // }
    public function trash() {
        $posts = post::onlyTrashed()->where('user_id',Auth::user()->id)->get() ; 
        return view('posts.trash',compact('posts')) ; 
    }
    public function restore ($id){
        $posts = post::onlyTrashed()->where('id',$id)->restore(); 
        return redirect(route('posts.show',$id))->with('success','Post is restored Successfully'); 
    }
    public function deleteforever($id)
    {
        $posts = post::onlyTrashed()->where('id',$id)->forceDelete() ; 
        return redirect(route('posts.trash'))->with('success','Post is deleted Successfully') ; 
    } 
    public function profile ($id)
    {
        $user = User::find($id)->first() ;  
        return view('posts.profile',compact('user')) ; 
    }
}

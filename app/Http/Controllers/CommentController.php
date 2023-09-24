<?php

namespace App\Http\Controllers;

use App\Models\comment;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect(route('posts.index')) ;  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request) ; 
        $request->validate(['comment'=>'required']) ; 
        $comment = new comment() ;
        $comment->comment = $request->comment ; 
        $comment->author = Auth::user()->name ; 
        $comment->post_id = $request->id ; 
        $comment->user_id = Auth::user()->id ; 
        $comment->save() ; 
        return redirect(route('posts.show',$comment->post_id))->with('success','Comment added successfully') ; 
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        return view('posts.edit-comment',compact('comment')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        $comment->comment = $request->comment ; 
        $comment->author =Auth::user()->name ; 
        $comment->post_id = $request->post_id ; 
        $comment->user_id = Auth::user()->id ; // can be unwritten ...
        $comment->update() ; 
        return redirect(route('posts.show',$comment->post_id))->with('success','Comment updated Successfully') ; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        $id = $comment->post_id ;
        $comment->delete() ; 
        return redirect(route('posts.show',$id))->with('success','Comment deleted successfully') ; 
    }
    public function softDelete($id) {
        $comment = comment::find($id) ;
        $post_id =$comment->post_id ;
        $comment->delete() ;  
        return(redirect(route('posts.show',$post_id)))->with('success','Comment is deleted Successfully') ; 
    }
    public function trashcom () 
    {
        $comments = comment::onlyTrashed()->where('user_id',Auth::user()->id)->get() ; 
        return view('posts.trashcom',compact('comments')) ; 
    }
    public function restore($id)
    {
        $comments = comment::onlyTrashed()->where('id',$id)->first() ; 
        $comment = comment::onlyTrashed()->where('id',$id)->restore() ; 
        return redirect(route('posts.show',$comments->post_id))->with('success','Comment is restored Successfully') ; 
    }
    public function deleteforever ($id) 
    {
        $comment = comment::onlyTrashed()->where('id',$id)->forceDelete() ;
        return redirect(route('comments.trash'))->with('success','comment is deleted permenantly') ; 
    }
}

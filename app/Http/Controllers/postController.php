<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\reaction;
use App\commentaire;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        //$user = auth()->user();
        $posts = Post::all();
        $allPosts = array();
        foreach($posts as $post)
        {       
                //return $filiere->enseignant->nom;
            $currentPost = array_merge($post->toArray(),array("nom" => $post->getUser->name));
            array_push($allPosts , $currentPost);
        }
        return response()->json(['posts' => $allPosts], 200); 
    }

    public function getReactions($id)
    {
        //$user = auth()->user();
        $reactions = reaction::all()->where('post',$id);
        $allReactions = array();
        foreach($reactions as $reaction)
        {       
                //return $filiere->enseignant->nom;
            array_push($allReactions , $reaction->getUser);
        }
        return response()->json(['reactions' => $allReactions], 200); 
    }

    public function getComments($id)
    {
        //$user = auth()->user();
        $comments = commentaire::all()->where('post',$id);
        $allComments = array();
        foreach($comments as $comment)
        {       
            $currentComment = array_merge($comment->toArray(),array("nom" => $comment->getUser->name));
            array_push($allComments , $currentComment);
        }
        return response()->json(['comments' => $allComments], 200); 
    }

    public function addComment($comment,$post)
    {
        $user = auth()->user();
        $newComment = new commentaire();
        $newComment->contenue = $comment;
        $newComment->post = $post;
        $newComment->author = $user->id;
        $newComment->date = date("Y/m/d");
        $newComment->save();
        return response()->json(['done' => 1], 200); 
    }

    public function addReaction($id)
    {
        $user = auth()->user();
        $reaction = new reaction();
        $reaction->post = $id;
        $reaction->author = $user->id;
        $reaction->date = date("Y/m/d");
        $reaction->save();
        return response()->json(['done' => 1], 200); 
    }

    public function deleteReaction($id)
    {
        $user = auth()->user();
        $reaction = reaction::where('post',$id)->where('author',$user->id)->first();
        $reaction->delete();
        return response()->json(['deletd' => 1], 200); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

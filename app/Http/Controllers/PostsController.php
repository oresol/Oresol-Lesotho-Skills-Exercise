<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;
use App\Models\Post;
// use DB;

class PostsController extends Controller
{
    
    public function createPage()
    {
        return view('create');
    }

    public function AddPosts(Request $req){
        $post = new Post;
        $post->title=$req->title; 
        $post->description=$req->description;
        $post->category=$req->category;
        $post->tags=$req->tags;
        $post->save();

        return redirect('create');
    }

    
    public function show()
    {
        //show posts when user is logged in in table
        $posts = Post::all();
        return view('/home', ['posts' => $posts]);

        //show posts for guest
        $posts = Post::all();
        return view('welcome', ['posts' => $posts]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

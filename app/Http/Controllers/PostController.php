<?php

namespace App\Http\Controllers;

use App\Models\Post; // Perbaikan namespace
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect('/about');
    }
    public function actuallyUpdatePost(Post $post, Request $request){
        $incomingField=$request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        $incomingField['title'] = strip_tags($incomingField['title']);
        $incomingField['body'] = strip_tags($incomingField['body']);

        $post->update($incomingField);
        return redirect('/about');

    }
    public function showEditScreen(Post $post){
        return view('edit-post', ['post' => $post]);
    }

    public function createPost(Request $request){
        $incomingField = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingField['title'] = strip_tags($incomingField['title']);
        $incomingField['body'] = strip_tags($incomingField['body']);

        Post::create($incomingField); // Memanggil model secara statis untuk create
        return redirect('/about');
    }
}

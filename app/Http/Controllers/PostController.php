<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Crypt;
use Auth;
class PostController extends Controller
{
    function index() {
        $posts = Post::latest()->paginate(10);
        return view('posts.index',compact('posts'));
    }

    function show($id) {
        $post = Post::find(Crypt::decrypt($id));
        return view('posts.show',compact('post'));
    }

    function store(Request $request) {
        // dd($request);
        $post = new Post;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->save();
        flash('Record created successfully!')->success()->important();
        return redirect()->back();
    }

    function edit($id) {
        $post = Post::find(Crypt::decrypt($id));
        return view('posts.edit',compact('post'));
    }

    function update($id, Request $request){
        $request->validate([
            'content'=>'required|min:50|max:200'
        ]);

        $post = Post::find(Crypt::decrypt($id));
        $post->content = $request->content;
        $post->save();
        flash('Record updated successfully!')->success()->important();
        return redirect()->route('post.index');
    }
}

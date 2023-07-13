<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Crypt;
use Auth;
class PostController extends Controller
{
    function index() {
        $posts = Post::latest()->get();
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

        return redirect()->back();
    }
}

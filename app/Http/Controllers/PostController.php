<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Crypt;
class PostController extends Controller
{
    function index() {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    function show($id) {
        $post = Post::find(Crypt::decrypt($id));
        return view('posts.show',compact('post'));
    }
}

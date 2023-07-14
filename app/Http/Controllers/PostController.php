<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Crypt;
use Auth;
class PostController extends Controller
{
    function index() {
        $posts = Post::with(['user'=>function($q){
            $q->withCount('posts');
        }])->withCount('comments')->latest()->paginate(10);
        // dd($posts);
        return view('posts.index',compact('posts'));
    }

    function show($id) {
        $post = Post::with('comments.user')->find(Crypt::decrypt($id));
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

    function destroy($id, Request $request) {
        Post::find($id)->delete();

        flash('Post deleted successfully')->error()->important();
        return redirect()->back();
    }
}

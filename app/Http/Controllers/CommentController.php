<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    function store(Request $request) {

        // $comment = new Comment;
        // $comment->content = $request->content;
        // $comment->post_id = $request->post_id;
        // $comment->user_id = Auth::user()->id;
        // $comment->save();

        $post = Post::find($request->post_id);
        $post->comments()->save(
            new Comment([
                'content'=>$request->content,
                'user_id'=>Auth::user()->id
            ])
        );

        return redirect()->back();
    }
}

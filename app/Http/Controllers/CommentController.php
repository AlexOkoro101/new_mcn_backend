<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function createComment(Request $request, $post_id)
    {
    	if(!Auth::check()){
    		return redirect(url('/blog/'.$post_id))->with('failure', 'Kindly Log In or create an Account to make comments.');
    	}

    	$post = Post::findOrFail($post_id);

    	$comment = new Comment();
    	$comment->comment = $request->comment;
    	$comment->user_id = Auth::user()->id;

    	$post->comments()->save($comment);

    	return redirect(url('/blog/'.$post_id));

    }
}

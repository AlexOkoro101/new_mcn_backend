<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('blog', compact('posts'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post_id_counter = 0;
        $post = Post::orderBy('created_at', 'desc')->first();

        if ($post == null) {
            $post_id_counter = 1;
        } else { 
            $post_id_counter = $post->id++;
        }

        $user = Auth::user();
        //$path = $request->file('image')->store($post_id_counter, 'blog');


        if ($request->file('image')){
            $filename = $post_id_counter."/".$request->file('image')->getClientOriginalname();

            //$image_thumb = Image::make($request->file('image'))->resize(100, null)->stream();

            $image_thumb = Image::make($request->file('image'))->resize(300, null, function ($c) {
                $c->aspectRatio();
                //$c->upsize();
            });

            $uploaded = Storage::disk('blog')->put($filename, $image_thumb->encode('jpg'));
        }





        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_body = $request->post_body;
        $post->post_image = $filename;

        $user->posts()->save($post);

        return redirect(url('/blog'));
        
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        $post->view_count++;
        $post->update();

        $comments = Comment::where('post_id', '=', $post_id)->orderBy('created_at', 'desc')->get();

        return view('blog-post', compact('post', 'comments'));
    }

    public function list_by($id)
    {
        $posts = Post::where('user_id', '=', $id)->orderBy('created_at', 'desc')->paginate(10);
        return view('blog', compact('posts', 'comments'));
    }
}
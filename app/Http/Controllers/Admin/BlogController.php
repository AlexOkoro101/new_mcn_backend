<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
    	$posts = Post::orderBy('created_at', 'desc')->paginate(10);
    	return view('admin.blog', compact('posts'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_title' => 'required',
            'post_body' => 'required'
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

            $image_thumb = Image::make($request->file('image'))->resize(500, null, function ($c) {
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

    	return redirect(url('/admin/blog'));
    	
    }
}

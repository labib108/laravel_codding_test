<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('pages.post.posts',compact('posts'));
    }
    public function create()
    {
        return view('pages.post.post-form');
    }
    
    public function store(Request $request)
    {

        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('post.index', ['id' => $post->id])
        ->with('status', 'Post created successfully!');
    }
   
}
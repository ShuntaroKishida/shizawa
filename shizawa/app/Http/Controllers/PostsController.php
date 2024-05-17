<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sleep' => 'required|integer|between:1,5',
            'tired' => 'required|integer|between:1,5',
            'drink' => 'required|integer|between:1,5',
            'hangover' => 'required|integer|between:1,5',
            'memo' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $post = new Post();
        $post->fill($validatedData);
        $post->user_id = auth()->id();
        $post->save();
        return redirect()->route('posts.index');
    }
}

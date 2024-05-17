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

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/posts');
            $post->image = basename($path);
        }

        $post->save();
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validatedData = $request->validate([
            'sleep' => 'required|integer|between:1,5',
            'tired' => 'required|integer|between:1,5',
            'drink' => 'required|integer|between:1,5',
            'hangover' => 'required|integer|between:1,5',
            'memo' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/posts');
            $validatedData['image'] = basename($path);
        }

        $post->update($validatedData);
        return redirect()->route('posts.show', $post->id);
    }
}

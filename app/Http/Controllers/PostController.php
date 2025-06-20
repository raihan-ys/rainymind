<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch posts with their categories and user information
        $posts = Post::join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users as created_by', 'posts.created_by', '=', 'created_by.id')
            ->select('posts.*', 'categories.name as category_name', 
                'created_by.name as created_by_name'
            )
            ->orderBy('posts.created_at', 'desc')
            ->paginate(10);
        
        return view('pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch categories for the dropdown
        $categories = Category::orderBy('name')->get();

        return view('pages.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Validate the request using the StorePostRequest
        $validated = $request->validated();

        // Create new post with the validated data
        try {
            $post = Post::create($validated);
            $id = $post->id;
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
        return redirect()->route('posts.show', $id)->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('pages.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::orderBy('name')->get();
        return view('pages.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $validated = $request->validated();
        $post->update($validated);
        $id = $post->id;
        return redirect()->route('posts.show', $id)->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}

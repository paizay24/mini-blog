<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Blog::when(request('q'),function($query){
            $q = request('q');
            $query->where('title','like',"%$q%")
                ->orWhere('description','like',"%$q%");

        })->paginate(5)->withQueryString();


        return view('index',[
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        Blog::create(
            [
                'title' => $request->title,
                'description' => $request->description
            ]

        );
        return redirect()->route('blog.index')->with(['status' => 'A new post added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('show', [
            'post' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('edit', [
            'post' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->update();
        return redirect()->route('blog.index')->with(['status' => 'A new post updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with(['status' => 'Post is deleeted']);
    }
}

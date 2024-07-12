<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        $posts = Post::all();
        return view('index',compact('posts'));
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect()->route('post.index')->with('status','Post Created Successfully');
    }

    public function show($id){
        $post = Post::find($id);
        return view('show',compact('post'));
    }
    public function delete($id){

        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('status','Post deleted Successfully');;
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }
    public function update(Request $request, $id){
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->update();
        return redirect()->route('post.index')->with('status','Post Updated Successfully');
    }
}


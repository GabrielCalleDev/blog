<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::all();
        return view('admin.posts.index', [ 'posts' => $posts ]);
    }

    public function new(){
        $categories = Category::all();
        return view('admin.posts.new', [ 'categories' => $categories ]);
    }

    public function store(Request $request){
        $request->validate([
            'post' => 'required|max:255',
        ]);

        $post = new Post();

        $post->post = $request->post;
        $post->save();
        
        return redirect()->route('admin.posts.index');
    }

    public function edit($id){
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'post' => 'required|unique:posts|max:100',
        ]);
        
        $post = Post::find($id);

        $post->post = $request->input('post');
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post actualizado con éxito.');
    }

    public function delete($id){
        Post::destroy($id);

        return redirect()->route('admin.posts.index')->with('alert', 'Post eliminado con éxito.');
    }
}

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

    public function livewire(){
        return view('admin.posts.livewire');
    }

    public function index(){
        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.posts.index', [ 'posts' => $posts ]);
    }

    public function new(){
        $categories = Category::all();
        return view('admin.posts.new', [ 'categories' => $categories ]);
    }

    public function store(Request $request){
        $request->validate([
            'post'        => 'required|max:255',
            'category_id' => 'required',
            'image'       => 'required',
            'content'     => 'required',
            'author'      => 'required'
        ]);

        $post = new Post();

        if ($request->hasFile('image')){
            $file            = $request->file('image');
            $destinationPath = 'images/posts/';
            $filename        = time().'-'.$file->getClientOriginalName();
            $request->file('image')->move($destinationPath, $filename);
              // Guardamos la ruta en la base de datos
            $post->image = $destinationPath . $filename;
        }
        $post->post        = $request->post;
        $post->category_id = $request->category_id;
        $post->content     = $request->content;
        $post->author      = $request->author;
        $post->save();
        
        return redirect()->route('admin.posts.index');
    }

    public function edit($id){
        $post       = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'post'        => 'required|max:255',
            'category_id' => 'required',
            'content'     => 'required',
            'author'      => 'required'
        ]);

        $post = Post::find($id);
        if ($request->hasFile('image')){
            $file            = $request->file('image');
            $destinationPath = 'images/posts/';
            $filename        = time().'-'.$file->getClientOriginalName();
            $request->file('image')->move($destinationPath, $filename);
            // Guardamos la ruta en la base de datos
            $post->image = $destinationPath . $filename;
        }
        $post->post        = $request->post;
        $post->category_id = $request->category_id;
        $post->content     = $request->content;
        $post->author      = $request->author;
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post actualizado con éxito.');
    }

    public function delete($id){
        Post::destroy($id);

        return redirect()->route('admin.posts.index')->with('alert', 'Post eliminado con éxito.');
    }
}

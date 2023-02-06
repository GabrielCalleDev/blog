<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $categories = Category::all();
        return view('admin.categories.index', [ 'categories' => $categories ]);
    }

    public function new(){
        return view('admin.categories.new');
    }

    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories|max:100',
        ]);

        $category = new Category();

        $category->category_name = $request->category_name;
        $category->save();
        
        return redirect()->route('admin.categories.index');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_name' => 'required|unique:categories|max:100',
        ]);
        
        $category = Category::find($id);

        $category->category_name = $request->input('category_name');
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Categoría actualizada con éxito.');
    }

    public function delete($id){
        Category::destroy($id);

        return redirect()->route('admin.categories.index')->with('alert', 'Categoría eliminada con éxito.');
    }
}
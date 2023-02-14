<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;


class CategoryComponent extends Component
{
    public $view = 'create';

    public  $category_id,
            $category_name;

    protected $rules = [
        'category_name' => "required|unique:categories"
    ];

    public function render()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('livewire.admin.category.category-component', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $this->resetErrorBag();
        $this->reset();
        $this->view = 'create';
    }

    public function save()
    {
        $this->validate();

        Category::create( $this->validate() );

        session()->flash('success', 'Categoría creada correctamente.');

        $this->reset();
    }

    public function edit($id)
    {
        $this->resetErrorBag();
        
        $category = Category::find($id);
        
        $this->category_id   = $category->id;
        $this->category_name = $category->category_name;
        
        $this->view = 'edit';
    }

    public function update()
    {   
        $category = Category::find($this->category_id);
        
        // Si el campo a editar es el mismo, se ignora ya que hay una restricción unique
        if($this->category_name == $category->category_name ){
            $this->reset();
            return;
        }

        $category->update($this->validate());

        session()->flash('info', 'Categoría actualizada correctamente.');

        $this->reset();
    }

    public function destroy($id)
    {
        session()->flash('delete', 'Categoría eliminada correctamente');

        Category::destroy($id);
    }
}

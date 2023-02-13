<?php

namespace App\Http\Livewire\Admin\Post;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Category;


class PostComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $view = 'create';

    public $post_id, $post, $category_id, $image, $content, $author;

    public function render()
    {
        $posts      = Post::orderBy('id', 'desc')->paginate(6);
        $categories = Category::all();
        return view('livewire.admin.post.post-component', [
            'posts'      => $posts,
            'categories' => $categories
        ]);
    }

    public function save()
    {
        $this->validate([
            'post'        => 'required',
            'category_id' => 'required',
            'content'     => 'required',
            'image'       => 'required',
            'author'      => 'required'
        ]);
        Post::create([
            'post'        => $this->post,
            'category_id' => $this->category_id,
            'content'     => $this->content,
            'image'       => $this->image->store('posts', 'public'),
            'author'      => $this->author
        ]);
        session()->flash('success', 'Post Created Successfully.');
        $this->reset();
    }

    public function edit($id)
    {
        $post = Post::find($id);

        $this->post_id = $post->id;
        $this->post = $post->post;
        $this->category_id = $post->category_id;
        $this->content = $post->content;
        $this->author = $post->author;

        $this->view = 'edit';

    }

    public function update()
    {
        $this->validate([
            'post'        => 'required',
            'category_id' => 'required',
            'content'     => 'required',
            'author'      => 'required'
        ]);
        

        $post = Post::find($this->post_id);

        $post->update([
            'post'        => $this->post,
            'category_id' => $this->category_id,
            'content'     => $this->content,
            'author'      => $this->author
        ]);
        session()->flash('info', 'Post Updated Successfully.');
        $this->reset();
    }

    public function destroy($id)
    {
        session()->flash('delete', 'Post Deleted Successfully.');
        Post::destroy($id);
    }
}

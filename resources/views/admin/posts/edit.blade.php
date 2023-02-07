@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Edición de posts') }}</div>

    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-6 p-3 border rounded-2">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Formulario de post -->
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="title" class="mb-2">Titulo de post</label>
                    <input type="text" class="form-control mb-2" name="post"  id="title" value="{{ old('post', $post->post) }}">
                    <label for="category-id" class="mb-2">Categoría</label>
                    <select class="form-control" name="category_id" id="category-id">
                        <option value="{{ old('category_id', $post->category_id) }}">{{ $categories->firstWhere('id', $post->category_id)->category_name }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <label for="content" class="mb-2">Contenido</label>
                    <textarea type="text" class="form-control mb-2" name="content" id="content"  placeholder="Introduce el contenido de tu post">{{ old('content', $post->content) }}</textarea>
                    <label for="author" class="mb-2">Autor</label>
                    <input type="text" class="form-control mb-2" name="author"  id="author" placeholder="Introduce un autor" value="{{ old('author', $post->author) }}">
                    <label for="image" class="mb-2">Imagen</label>
                    <input type="file" class="form-control mb-2" name="image"  id="image">
                    <small>Imagen actual</small>
                    <img src="{{ asset($post->image) }}" alt="{{ $post->post }}" class="img-fluid img-thumbnail" width="50">
                    <button type="submit" class="btn btn-success">Editar post</button>
                    <a class="btn btn-danger" href="{{ route('admin.posts.index') }}">Cancelar</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Gestión de los posts') }}</div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('alert'))
            <div class="alert alert-warning">
                {{ session('alert') }}
            </div>
        @endif

        <a href="{{ route('admin.posts.new') }}"><button class="btn btn-success">Crear post</button></a>
        <hr>
        Listado de posts
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoría</th>
                        <th>Post</th>
                        <th>Contenido</th>
                        <th>Imagen</th>
                        <th>Author</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ( $posts as $post )
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->category->category_name }}</td>
                        <td>{{ $post->post }}</td>
                        <td>{{ $post->content }}</td>
                        <td><img src="{{ asset($post->image) }}" alt="{{ $post->post }}" class="img-fluid img-thumbnail" width="120"></td>
                        <td>{{ $post->author }}</td>
                        <td>
                            <a class="d-inline-flex text-decoration-none mb-1" href="{{ route('admin.posts.edit', $post->id) }}"><button class="btn btn-warning">Editar</button></a>
                            <form class="d-inline-flex" action="{{ route('admin.posts.delete', $post->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

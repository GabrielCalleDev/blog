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
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                    <th>Post</th>
                    <th>Contenido</th>
                    <th>Author</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ( $posts as $post )
                <tr>
                    <th>{{ $post->id }}</th>
                    <th>{{ $post->category->category_name }}</th>
                    <th>{{ $post->post }}</th>
                    <th>{{ $post->content }}</th>
                    <th>{{ $post->author }}</th>
                    <th>
                        <a class="d-inline-flex text-decoration-none" href="{{ route('admin.posts.edit', $post->id) }}"><button class="btn btn-warning">Editar</button></a>
                        <form class="d-inline-flex" action="{{ route('admin.posts.delete', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

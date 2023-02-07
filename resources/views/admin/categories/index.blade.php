@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Categorías del blog') }}</div>

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

        <a href="{{ route('admin.categories.new') }}"><button class="btn btn-success">Crear categoría</button></a>
        <hr>
        Listado de categorías
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ( $categories as $category )
                <tr>
                    <th>{{ $category->id }}</th>
                    <th>{{ $category->category_name }}</th>
                    <th>
                        <a class="d-inline-flex text-decoration-none" href="{{ route('admin.categories.edit', $category->id) }}"><button class="btn btn-warning">Editar</button></a>
                        <form class="d-inline-flex" action="{{ route('admin.categories.delete', $category->id) }}" method="post">
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

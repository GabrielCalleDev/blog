@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Administración del categorías') }}</div>

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
                <!-- Formulario de categoría -->
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <label for="category-name" class="mb-2">Nombre de categoría</label>
                    <input type="text" class="form-control mb-2" name="category_name"  id="category-name" placeholder="Introduce una nueva categoría">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" href="{{ route('admin.categories.index') }}">Cancelar</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

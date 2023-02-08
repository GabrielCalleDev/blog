@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Edición del categorías') }}</div>

    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-6 p-3 border rounded-2">
                <!-- errores del formulario -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulario de usuario -->

                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    <label for="name" class="mb-2">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control mb-2" value="{{ old('name', $user->name) }}">

                    <label for="role" class="mb-2">Rol:</label>

                    <select name="role" id="role" class="form-control mb-2">
                        <option value="">Selecciona un perfil</option>
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>Usuario</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrador</option>
                    </select>

                    <button type="submit" class="mt-3 btn btn-success">Actualizar usuario</button>
                    <a class="btn btn-danger mt-3" href="{{ route('admin.users.index') }}">Cancelar</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

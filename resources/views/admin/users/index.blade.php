@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Gestión de usuarios del blog') }}</div>

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

        <a href="{{ route('admin.users.new') }}"><button class="btn btn-success">Crear usuario nuevo</button></a>
        <hr>
        {{ __('Sección de usuarios') }}
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ( $users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a class="d-inline-flex text-decoration-none" href="{{ route('admin.users.edit', $user->id) }}"><button class="btn btn-warning">Editar</button></a>
                            <form class="d-inline-flex" action="{{ route('admin.users.delete', $user->id) }}" method="post">
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

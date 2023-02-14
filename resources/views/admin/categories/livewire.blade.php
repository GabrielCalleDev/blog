@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Gestión de categorias con LiveWire') }}</div>

    <div class="card-body">

        <!-- Contenido -->
        @livewire('admin.category.category-component')
        <!-- Fin Contenido -->
    </div>
</div>
@endsection

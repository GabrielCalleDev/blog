@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Prueba de livewire') }}</div>

    <div class="card-body">

        <!-- Contenido -->
        @livewire('admin.post.post-component')
        <!-- Fin Contenido -->
    </div>
</div>
@endsection

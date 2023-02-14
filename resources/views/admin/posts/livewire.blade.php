@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Gestión de posts con livewire') }}</div>

    <div class="card-body">

        <!-- Contenido -->
        @livewire('admin.post.post-component')
        <!-- Fin Contenido -->
    </div>
</div>
@endsection

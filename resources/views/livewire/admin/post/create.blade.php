<h3 class="bg-warning bg-opacity-50 text-dark rounded p-1 text-center">Crear un nuevo producto</h3>

<!-- En la vista create, añadimos el formulario -->
@include('livewire.admin.post.form')

<button class="btn btn-success" wire:click='save'>
    Crear producto
</button>
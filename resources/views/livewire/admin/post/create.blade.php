<h3>Crear un nuevo producto</h3>

<!-- En la vista create, añadimos el formulario -->
@include('livewire.admin.post.form')

<button class="btn btn-success" wire:click='save'>
    Crear producto
</button>
<h3 class="bg-warning bg-opacity-50 text-dark rounded p-1 text-center">Crear una nueva categoria</h3>

<!-- En la vista create, añadimos el formulario -->
@include('livewire.admin.category.form')

<button class="btn btn-success mt-2" wire:click='save'>
    Crear categoría
</button>
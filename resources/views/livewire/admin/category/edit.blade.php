<h3 class="bg-primary text-white rounded py-3 text-center">Editar categoría</h3>

<!-- En la vista edit, añadimos el formulario -->
@include('livewire.admin.category.form')

<button class="btn btn-primary mt-1" wire:click="update">Guardar cambios</button>
<button class="btn btn-danger mt-1" wire:click="create">Cancelar</button>
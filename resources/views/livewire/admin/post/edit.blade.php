<h3 class="bg-primary text-white rounded py-3 text-center">Editar producto</h3>

    @include('livewire.admin.post.form')

<button class="btn btn-primary" wire:click="update">Guardar cambios</button>
<button class="btn btn-danger" wire:click="create">Cancelar</button>
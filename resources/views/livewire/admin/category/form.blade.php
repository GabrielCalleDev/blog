<label for="name" class="mt-2">Nombre de categoría</label>
@error('category_name') <span class="text-danger d-block m-0">{{ $message }}</span> @enderror
<input type="text" class="form-control" wire:model="category_name" id="name" placeholder="Introduce un nombre">

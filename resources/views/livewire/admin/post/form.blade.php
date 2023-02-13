<label for="title" class="mt-2">Titulo de post</label>
@error('post') <span class="text-danger d-block m-0">{{ $message }}</span> @enderror
<input type="text" class="form-control" wire:model="post" id="title" placeholder="Introduce un titulo">

<label for="category-id" class="mt-2">Categoría</label>
@error('category_id') <span class="text-danger d-block m-0">{{ $message }}</span> @enderror
<select class="form-control" wire:model="category_id" id="category-id">
    <option value="">Elegir categoria</option>
    @foreach ($categories as $category)
    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
    @endforeach
</select>

<label for="content" class="mt-2">Contenido</label>
@error('content') <span class="text-danger d-block m-0">{{ $message }}</span> @enderror
<textarea type="text" class="form-control mb-2" wire:model="content" id="content" placeholder="Introduce el contenido de tu post">{{ old('content') }}</textarea>

<label for="author" class="mt-2">Autor</label>
@error('author') <span class="text-danger d-block m-0">{{ $message }}</span> @enderror
<input type="text" class="form-control mb-2" wire:model="author" id="author" placeholder="Introduce un autor" value="{{ old('author') }}">

<label for="image" class="mt-2">Imagen</label>
@error('image') <span class="text-danger d-block m-0">{{ $message }}</span> @enderror
<input type="file" class="form-control mb-2" wire:model="image" id="image">
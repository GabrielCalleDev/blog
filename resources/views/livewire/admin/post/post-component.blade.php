<div>
    <div class="row">
        <div class="col-md-4">
            <div class="container border border-warning rounded p-4">
                @include("livewire.admin.post.$view")
            </div>
        </div>
        <div class="col-md-8 border rounded pt-2">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
            @endif
            @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
            @endif
            <div class="mt-2 table-responsive-lg">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Post</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Author</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->category->category_name }}</td>
                            <td>{{ $post->post }}</td>
                            <td><img src="{{ $post->image }}" alt="{{ $post->post }}" class="img-fluid img-thumbnail" width="120"></td>
                            <td>{{ $post->author }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-success mt-1" wire:click='edit({{ $post->id }})'>Editar</button>
                                <button type="button" class="btn btn-outline-danger mt-1" wire:click='destroy({{ $post->id }})'>Borrar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links('pagination::Bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
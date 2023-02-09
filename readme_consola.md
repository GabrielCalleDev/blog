# Instalación de adminlte
composer require jeroennoten/laravel-adminlte
php artisan adminlte:install

Para instalar las vistas solamente.
php artisan adminlte:install --only=main_views

# Controladores
php artisan make:controller Admin/CategoriesController


# Modelos
php artisan make:model Category -m
php artisan make:model Post -m
php artisan make:model Role

php artisan migrate

# Rutas

# Migraciones
php artisan make:migration add_image_field_to_posts
php artisan make:migration add_role_to_users_table
php artisan make:migration create_roles_table

# Seeders
php artisan make:seeder RolesTableSeeder
php artisan make:seeder UsersTableSeeder


# Middlewares
php artisan make:middleware CheckRole

# Archivos
php artisan storage:link



##
Notas de php

## Gestión de los mensajes de sesión
Para gestionar la sesiones, es mejor verificarlas antes de imprimirlas. Por ejemplo:
```php
@if(session('status'))
    <div class="status">
        {{ session("status") }}
    </div>
@endif
```
En lugar de : 

```php
    <div class="status">
        {{ session("status") }}
    </div>
```

### Para la gestion de errores: 
Para una mejor gestión de los mensajes de error de un formulario se pueden mostra los
errores de manera individual. Por ejemplo: 
```php
<input name="titulo" type="text" value="{{ old('titulo') }}">
@error('titulo')
    <br>
    <small style="color:red">{{ $message }}</small>
@enderror
```

### Mensajes de validación - Traduccion
https://github.com/Laravel-Lang/lang/tree/main/locales/es
config->
    app.php->
        'locale' => 'en' [Cambiarlo->] 'locale' => 'es'

Una vez cambiado el valor, hemos de crear un directorio en:
lang->
     es->
        validation.php

En el archivo validation.php escribimos lo siguiente:
```php
return [
    'required' => 'El campo :attribute es obligatorio',
    'attributes' => [
        'title' => 'título',
        'body' => 'contenido'
    ]
];
```
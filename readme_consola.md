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

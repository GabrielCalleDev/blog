<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','admin')->first();

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            // 'password' => Hash::make("administrador"),
            'password' => bcrypt('administrador'),
            'role_id' => $role->id
        ]);

    }
}

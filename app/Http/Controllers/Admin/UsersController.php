<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UsersController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $users = User::all();
        return view('admin.users.index',[
            "users" => $users
        ]);
    }

    public function new(){
        $roles = Role::all();
        return view('admin.users.new', [ 'roles' => $roles ]);
    }

    public function store(Request $request){
        $request->validate([
            'name'     => 'required|max:100',
            'email'    => 'required|unique:users|max:100',
            'password' => 'required|confirmed',
            'role_id'  => 'required',
        ]);

        $user = new User();

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id  = $request->role_id;
        $user->save();

        return redirect()->route('admin.users.index');
    }

    public function edit($id){
        $user  = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit', [
            'user'  => $user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'    => 'required|max:100',
            'role_id' => 'required',
        ]);

        $user = User::find($id);

        $user->name    = $request->name;
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado con éxito.');
    }

    public function delete($id){
        User::destroy($id);

        return redirect()->route('admin.users.index')->with('alert', 'Usuario eliminado con éxito.');
    }
}

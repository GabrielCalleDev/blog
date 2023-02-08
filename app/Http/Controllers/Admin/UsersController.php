<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
        return view('admin.users.index',[
            "users" => $users
        ]);
    }

    public function new(){
        return view('admin.users.new');
    }

    public function store(Request $request){
        $request->validate([
            'name'     => 'required|max:100',
            'email'    => 'required|unique:users|max:100',
            'password' => 'required|confirmed',
            'role'     => 'required',
        ]);

        $user = new User();

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = $request->password;
        $user->role     = $request->role;
        $user->save();
        
        return redirect()->route('admin.users.index');
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'     => 'required|max:100',
            'role'     => 'required',
        ]);

        $user = User::find($id);

        $user->name     = $request->name;
        $user->role     = $request->role;
        $user->save();
        
        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado con éxito.');
    }

    public function delete($id){
        User::destroy($id);

        return redirect()->route('admin.users.index')->with('alert', 'Usuario eliminado con éxito.');
    }
}

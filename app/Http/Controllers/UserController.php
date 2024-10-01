<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('home.user.index', compact('users'));
    }

    public function create()
    {
        return view('home.user.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Crear un nuevo usuario en la base de datos
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirigir al usuario a la página de índice con un mensaje de éxito
        return redirect()->route('user.create')->with('success', 'Usuario creado exitosamente');
    }

    public function edit(User $user){
        return view('home.user.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);
    
        $userData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ];

        User::findOrfail($user->id)->update($userData);

        return redirect()->back()->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->back()->with('success','Usuario eliminado correctamente');
    }
}

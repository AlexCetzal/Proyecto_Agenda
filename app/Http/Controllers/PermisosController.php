<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        return view('permisos', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',  
            'permisos' => 'required|array|min:1',  
            'permisos.*' => 'string',   
        ]);

        $user_id = $request->input('user_id');
        $permisos = $request->input('permisos', []);

        \Log::info('Permisos recibidos:', $permisos); 

        foreach ($permisos as $permiso) {
            Permiso::create([
                'user_id' => $user_id,  
                'nombre' => $permiso,    
            ]);
        }

        return redirect()->route('home')->with('success', 'Permisos guardados correctamente.');
    }
}

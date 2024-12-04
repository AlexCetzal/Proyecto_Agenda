<?php

namespace App\Http\Controllers;

use App\Models\Ubicaciones;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function index()
{
    $ubicacion = Ubicaciones::all();
    return view('catalogo_eventos.ubicacion', compact('ubicacion'));
}
public function getSelect()
{
    $ubicacion = Ubicaciones::all();
    return view('layouts.calendario.calendar', compact('ubicacion'));
}


public function store(Request $request)
{
    $request->validate([
        'edificio' => 'required|string|max:255',
        'lugar' => 'required|string|max:255',
        'aula' => 'required|string|max:255|unique:ubicacion',
    ]);

    Ubicaciones::create($request->all()); 

    return redirect()->route('ubicacion.index')->with('success', 'Ubicacion añadida.');
}

public function update(Request $request, Ubicaciones $ubicaciones) 
{
    $request->validate([
        'edificio' => 'required|string|max:255',
        'lugar' => 'required|string|max:255',
        'aula' => 'required|string|max:255|unique:ubicacion,aula,' . $ubicaciones->id,
    ]);

    $ubicaciones->update($request->all()); 

    return redirect()->route('ubicacion.index')->with('success', 'Ubicacion actualizada.');
}

    public function destroy(Ubicaciones $ubicaciones)
    {
        $ubicaciones->delete();

        return redirect()->route('ubicacion.index')->with('success', 'Ubicacion eliminado.');
    }
}

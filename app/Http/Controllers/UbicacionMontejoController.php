<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UbicacionesMontejos;
use Illuminate\Http\Request;

class UbicacionMontejoController extends Controller
{
    public function index()
    {
        $ubicacion_montejo = UbicacionesMontejos::all();
        return view('catalogo_eventos.ubicacion_montejo', compact('ubicacion_montejo'));
    }
    public function getSelect()
    {
        $ubicacion_montejo = UbicacionesMontejos::all();
        return view('layouts.calendario.calendar', compact('ubicacion_montejo'));
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'edificio' => 'required|string|max:255',
            'lugar' => 'required|string|max:255',
            'aula' => 'required|string|max:255|unique:ubicacion_montejo',
        ]);
    
        UbicacionesMontejos::create($request->all()); 
    
        return redirect()->route('ubicacion_montejo.index')->with('success', 'Ubicacion añadida.');
    }
    
    public function update(Request $request, UbicacionesMontejos $ubicacion_montejo) 
    {
        $request->validate([
            'edificio' => 'required|string|max:255',
            'lugar' => 'required|string|max:255',
            'aula' => 'required|string|max:255|unique:ubicacion_montejo,aula,' . $ubicacion_montejo->id,
        ]);
    
        $ubicacion_montejo->update($request->all()); 
    
        return redirect()->route('ubicacion_montejo.index')->with('success', 'Ubicacion actualizada.');
    }
    
        public function destroy(UbicacionesMontejos $ubicacion_montejo)
        {
            $ubicacion_montejo->delete();
    
            return redirect()->route('ubicacion_montejo.index')->with('success', 'Ubicacion eliminado.');
        }
}

<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use Illuminate\Http\Request;

class CampoController extends Controller
{
    public function index()
    {
        $campos = Campo::all(); // Usar el nombre correcto del modelo
        return view('catalogo_eventos.campos', compact('campos'));
    }
    public function getSelect()
{
    $campos = Campo::all();
    return view('layouts.calendario.calendar', compact('campos'));
}
    
    
        public function store(Request $request)
        {
            $request->validate([
                'lugar' => 'required|string|max:255',
                'campo_cancha' => 'required|string|max:255',
            ]);
    
            Campo::create($request->all());
    
            return redirect()->route('campos.index')->with('success', 'Campo añadido.');
        }
    
        public function update(Request $request, campo $campo)
        {
            $request->validate([
                'lugar' => 'required|string|max:255',
                'campo_cancha' => 'required|string|max:255',
            ]);
        
            $campo->update($request->all());
        
            return redirect()->route('campos.index')->with('success', 'Campo actualizado.');
        }
        
    
        public function destroy(campo $campo)
        {
            $campo->delete();
        
            return redirect()->route('campos.index')->with('success', 'Campo eliminado.');
        }
        
}
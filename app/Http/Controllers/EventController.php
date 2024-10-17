<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('actividades_Modelo'); // Ruta de la vista principal
    }

    public function getEvents(Request $request)
    {
        $section = $request->query('section');
        if ($section == 'centro_cultural') {
            $section = 1;
        }
        if ($section == 'campos_modelo') {
            $section = 2;
        } 
        // Filtrar los eventos por la sección correspondiente
        $events = Events::where('tipo_evento', $section)
                        ->select('id', 'title', 'description', 'start', 'end')
                        ->get();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        // Validación de los campos
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'nullable|date',
            'description' => 'nullable|string',
            'section' => 'required|string', // Deja que la sección sea dinámica          
        ]);
        if ($validated['section'] == 'centro_cultural') {
            $validated['tipo_evento'] = 1;
        }
        if ($validated['section'] == 'campos_Modelo') {
            $validated['tipo_evento'] = 2;
        } 
        // Crear el evento utilizando los datos validados
        $event = Events::create($validated);
        return response()->json($event);
    }
}

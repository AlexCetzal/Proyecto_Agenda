<?php

namespace App\Http\Controllers;

use App\Models\Events;
use DateTime;
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

        $events = Events::where('tipo_evento', $section)
            ->select('id', 'title', 'description', 'start', 'startTime', 'end', 'endTime', 'vehiculos')
            ->get();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        try {
            // Validación de los campos
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'start' => 'required|date',
                'startTime' => 'required|date_format:H:i',
                'end' => 'nullable|date',
                'endTime' => 'nullable|date_format:H:i',
                'description' => 'nullable|string',
                'vehiculos' => 'required|in:Chevrolet_Malibu,Chevrolet_Suburban,Dodger_Ram,Ford_Expedition,GMC_Terrain,Toyota_Sienna',
                'section' => 'required|string',
            ]);
            $validated['start'] = (new DateTime($validated['start']))->format('Y-m-d');
            $validated['end'] = (new DateTime($validated['start']))->format('Y-m-d');

            $validated['startTime'] = $validated['start'] . ' ' . $validated['startTime'];
            if ($validated['endTime']) {
                $validated['endTime'] = $validated['end'] . ' ' . $validated['endTime'];
            }

            $existingEvent = Events::where('start', $validated['start'])
                ->where('startTime', $validated['startTime'])
                ->first();
            if ($existingEvent) {
                return response()->json(['error' => 'Ya existe un evento en esta fecha y hora.'], 400);
            }

            if ($validated['section'] == 'centro_cultural') {
                $validated['tipo_evento'] = 1;
            }
            if ($validated['section'] == 'campos_Modelo') {
                $validated['tipo_evento'] = 2;
            }
            if ($validated['section'] == 'actividades_Modelo') {
                $validated['tipo_evento'] = 3;
            }

            // Crear el evento utilizando los datos validados
            $event = Events::create($validated);
            return response()->json(['success' => true, 'event' => $event], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 400);
        }
    }
}
